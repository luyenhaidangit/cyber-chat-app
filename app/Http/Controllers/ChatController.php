<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $friends = $user->friends;

        return view('chat.index', compact('friends'));
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
                $query->where('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('username', 'like', '%' . $searchTerm . '%');
            })
            ->get();

        return response()->json(['status' => true, 'data' => $friends]);
    }

    public function editAccount(Request $request)
    {
        $user = Auth::user();

        $email = $request->input('email');
        $fullName = $request->input('full_name');

        // Kiểm tra xem email mới có trùng với email của người dùng khác không
        if ($email !== $user->email && User::where('email', $email)->exists()) {
            return response()->json(['status' => false, 'message' => 'Email đã tồn tại']);
        }

        $user->email = $email;
        $user->full_name = $fullName;
        $user->save();

        return response()->json(['status' => true, 'data' => $user]);
    }

}