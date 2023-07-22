<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Facades\UserFacade;


class GuestController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        $data = [
            'title' => 'Đăng nhập',
        ];

        return view('guest.login')->with($data);
    }

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

    public function register()
    {
        $data = [
            'title' => 'Đăng ký',
        ];

        return view('guest.register')->with($data);
    }

    public function postRegister(GuestRegisterRequest $request)
    {
        $user = UserFacade::guestRegister($request);
        return response()->api($user, true, 200, 'Người dùng đăng ký thành công!');
    }

    /**
     * Logout the user.
     *
     *  @return \Illuminate\Contracts\View\View
     */
    public function logout()
    {
        return view('guest.logout');
    }

    /**
     * Show the change password form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function changePassword()
    {
        return view('guest.change-password');
    }

    /**
     * Process the change password form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangePassword(Request $request)
    {
        // Your change password logic here
        // ...

        // After successful password change, you can redirect to any page
        return redirect()->route('login')->with('success', 'Đổi mật khẩu thành công. Vui lòng đăng nhập lại.');
    }

    /**
     * Show the lock screen form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function lockScreen()
    {
        return view('guest.lock-screen');
    }

    /**
     * Process the lock screen form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLockScreen(Request $request)
    {
        // Your lock screen logic here
        // ...

        // After successful lock screen, you can redirect to any page
        return redirect()->route('dashboard');
    }

    /**
     * Show the password recovery form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function recover()
    {
        return view('guest.recover');
    }

    /**
     * Process the password recovery form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRecover(Request $request)
    {
        // Your password recovery logic here
        // ...

        // After successful recovery request, you can redirect to any page
        return redirect()->route('login')->with('success', 'Yêu cầu khôi phục mật khẩu đã được gửi đến email của bạn.');
    }
}