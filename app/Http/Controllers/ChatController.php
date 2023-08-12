<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chat\ChangePasswordRequest;
use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Friendship;
use App\Models\Conversation;
use App\Models\UserConversation;
use App\Models\Message;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    protected $authService;
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    //Index
    public function index()
    {
        $user = Auth::user();
        $friends = $user->friends;

        return view('chat.index', compact('friends'));
    }

    //Logout
    public function postLogout()
    {
        $this->authService->logout();
        return redirect()->route('logout');
    }

    //Change password
    public function renderChangePasswordPage()
    {
        $data = [
            'title' => 'Thay đổi mật khẩu'
        ];
        return view('chat.change-password')->with($data);
    }
    public function submitChangePassword(ChangePasswordRequest $request)
    {
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');

        $result = $this->authService->changePassword($old_password, $new_password);

        if ($result === true) {
            return redirect()->route('chat');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác!');
        }
    }

    public function accessDeniedErrorView()
    {
        return view('chat.403');
    }

    public function searchFriendContact(Request $request)
    {
        $searchTerm = $request->input('name');

        $user = Auth::user();

        $friends = $user->friends()
            ->where(function ($query) use ($searchTerm) {
                $query->where('username', 'like', '%' . $searchTerm . '%');
            })
            ->get();

        return response()->json(['status' => true, 'data' => $friends]);
    }

    public function editAccount(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'full_name' => 'required|string',
        ]);

        $user = Auth::user();

        $newEmail = $validatedData['email'];
        $newFullName = $validatedData['full_name'];

        // Check if the new email already exists for a different user
        if ($newEmail !== $user->email && User::where('email', $newEmail)->exists()) {
            return response()->json(['status' => false, 'message' => 'Email đã tồn tại']);
        }

        // Update user data
        $user->email = $newEmail;
        $user->full_name = $newFullName;
        $user->save();

        return response()->json(['status' => true, 'data' => $user]);
    }

    public function getMessages(Request $request, $friendId)
    {
        $conversationId = UserConversation::where('user_id', Auth::user()->id)
            ->whereIn('conversation_id', function ($query) use ($friendId) {
                $query->select('conversation_id')
                    ->from('user_conversations')
                    ->where('user_id', $friendId);
            })
            ->value('conversation_id');

        if ($conversationId) {
            $messages = Message::with('sender')
                ->where('conversation_id', $conversationId)
                ->get();
        }

        return response()->json([
            "status" => true,
            "data" => $messages
        ]);
    }

    public function postMessage(Request $request)
    {
        $friendId = $request->input('friendId');
        $message = $request->input('message');

        $conversationId = UserConversation::where('user_id', Auth::user()->id)
            ->whereIn('conversation_id', function ($query) use ($friendId) {
                $query->select('conversation_id')
                    ->from('user_conversations')
                    ->where('user_id', $friendId);
            })
            ->value('conversation_id');

        if ($conversationId) {
            $newMessage = new Message();
            $newMessage->user_id = Auth::user()->id;
            $newMessage->conversation_id = $conversationId;
            $newMessage->message = $message;
            $newMessage->status = 1;
            $newMessage->created_by = Auth::user()->id;
            $newMessage->updated_by = Auth::user()->id;
            $newMessage->uuid = Str::uuid();
            $newMessage->save();
        }

        return response()->json([
            "status" => true,
            "data" => "Thành công"
        ]);
    }

    public function acceptFriendRequest(Request $request)
    {
        $user = Auth::user();
        $friendId = $request->input('friend_id');

        // Kiểm tra xem có lời mời kết bạn từ người bạn này hay không
        $friendship = Friendship::where([
            'user_id' => $friendId,
            'friend_id' => $user->id,
            'status' => 'pending',
        ])->first();

        if (!$friendship) {
            return response()->json(['message' => 'Không tìm thấy lời mời kết bạn.'], 200);
        }

        // Cập nhật status để xác nhận kết bạn
        $friendship->update(['status' => 'accepted']);

        Friendship::create([
            'user_id' => $user->id,
            'friend_id' => $friendId,
            'status' => 'accepted',
        ]);

        $conversation = Conversation::create([
            'owner_user_id' => $user->id,
            'uuid' => Str::uuid(),
            'name' => 'Chat Private',
            'status' => 1,
            'type' => 'private'
        ]);

        $conversationId = $conversation->id;

        UserConversation::create([
            'user_id' => $user->id,
            'conversation_id' => $conversationId,
            'status' => 1,
            'created_by' => $user->id,
        ]);

        UserConversation::create([
            'user_id' => $friendId,
            'conversation_id' => $conversationId,
            'status' => 1,
            'created_by' => $user->id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Kết bạn thành công.',
            'data' => [
                'user_id' => $user->id,
                'friend_id' => $friendId,
            ],
            'test' => $conversation
        ]);
    }
}