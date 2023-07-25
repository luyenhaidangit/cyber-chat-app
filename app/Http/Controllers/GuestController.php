<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Http\Requests\Guest\ForgotPasswordRequest;
use App\Http\Requests\Guest\VerifyEmailRequest;
use App\Http\Requests\Guest\LoginRequest;
use App\Http\Requests\Guest\ResetPasswordRequest;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Facades\UserFacade;
use Exception;
use App\Exceptions\ApiException;

class GuestController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    //Login
    public function login()
    {
        $data = [
            'title' => 'Đăng nhập',
            'success_message' => session('success_message')
        ];

        return view('guest.login')->with($data);
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        $result = $this->userService->login($credentials, $remember);

        if ($result) {
            return redirect()->route('chat');
        } else {
            return redirect()->route('login')->with('error', 'Tên tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    //Logout
    public function postLogout()
    {
        $this->userService->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất thành công!');
    }

    //Register
    public function register()
    {
        $data = [
            'title' => 'Đăng ký',
        ];

        return view('guest.register')->with($data);
    }

    public function postRegister(GuestRegisterRequest $request)
    {
        UserFacade::guestRegister($request);
        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng xác nhận email để tiếp tục đăng nhập!');
    }

    //Verify
    public function verifyEmail(VerifyEmailRequest $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');
        try {
            $user = UserFacade::verifyEmail($email, $token);
            if ($user && !is_null($user->email_verified_at)) {
                return response()->api($user, true, 200, 'Người dùng xác nhận tài khoản thành công!');
            } else {
                return response()->api($user, false, 400, 'Người dùng xác nhận tài khoản thất bại!');
            }
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    //Forgot Password
    public function recover()
    {
        $data = [
            'title' => 'Quên mật khẩu',
        ];
        return view('guest.recover')->with($data);
    }
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $email = $request->input('email');
        try {
            UserFacade::forgotPassword($email);
            return response()->api(null, true, 200, 'Yêu cầu quên mật khẩu thành công!');
        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    //Change password
    public function changePassword()
    {
        $data = [
            'title' => 'Xác nhận thay đổi mật khẩu',
        ];
        return view('guest.change-password')->with($data);
    }

    public function submitChangePassword(ResetPasswordRequest $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');
        $password = $request->input('password');
        try {
            $user = UserFacade::resetPassword($email, $token, $password);
            if ($user) {
                return response()->api(null, true, 200, 'Yêu cầu thay đổi mật khẩu thành công!');
            } else {
                return response()->api(null, false, 400, 'Yêu cầu thay đổi mật khẩu thất bại!');
            }

        } catch (ApiException $e) {
            throw new ApiException($e->getData(), $e->getStatus(), $e->getCode(), $e->getMessage());
        }
    }

    public function logout()
    {
        return view('guest.logout');
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