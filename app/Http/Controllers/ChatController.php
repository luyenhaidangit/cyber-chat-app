<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}