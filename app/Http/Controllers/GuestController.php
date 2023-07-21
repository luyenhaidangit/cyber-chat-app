<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('guest.login');
    }

    /**
     * Process the login form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/dashboard'); // Redirect to the dashboard or the intended URL after login
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Process the registration form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(Request $request)
    {
        // Your registration logic here
        // ...

        // After successful registration, you can redirect to the login page or any other page
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}