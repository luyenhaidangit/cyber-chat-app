<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friendship;
use App\Models\User;
use Auth;

class FriendshipController extends Controller
{
    public function sendFriendRequestByEmail(Request $request)
    {
        $user = Auth::user();
        $friendEmail = $request->input('email');

        $friend = User::where('email', $friendEmail)->first();
        if (!$friend) {
            return response()->json(['message' => 'Người dùng không tồn tại.'], 200);
        }

        if ($user->id == $friend->id) {
            return response()->json(['message' => 'Bạn không thể gửi lời mời kết bạn cho chính mình.'], 200);
        }

        if (!$friend->hasRole('user')) {
            return response()->json(['message' => 'Bạn chỉ có thể gửi lời mời kết bạn cho người dùng có role là user.'], 200);
        }

        $existingRequest = Friendship::where([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
        ])->first();

        if ($existingRequest) {
            return response()->json(['message' => 'Lời mời kết bạn đã tồn tại.'], 200);
        }

        Friendship::create([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
            'status' => 'pending',
        ]);

        return response()->json(['status' => true, 'message' => 'Lời mời kết bạn đã được gửi.']);
    }
}