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
}