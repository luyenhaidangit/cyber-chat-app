<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Guest\GuestRegisterRequest;
use App\Http\Requests\Guest\ForgotPasswordRequest;
use App\Http\Requests\Guest\VerifyEmailRequest;
use App\Http\Requests\Guest\LoginRequest;
use App\Http\Requests\Guest\ResetPasswordRequest;
use App\Http\Requests\Guest\OpenLockScreenRequest;
use App\Http\Requests\Guest\RecoverRequest;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Facades\UserFacade;
use App\Exceptions\ApiException;
use App\Constants\RoleConstants;

class GuestController extends Controller
{
    protected $userService;
    protected $authService;

    public function __construct(UserServiceInterface $userService, AuthServiceInterface $authService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }

    //Login
    public function login()
    {
        $data = [
            'title' => 'Đăng nhập'
        ];

        return view('guest.login')->with($data);
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        $result = $this->authService->login($credentials, $remember);

        if ($result) {
            return redirect()->route('chat');
        } else {
            return redirect()->route('login')->with('error', 'Tên tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    //Logout
    public function logout()
    {
        $data = [
            'title' => 'Đăng nhập'
        ];
        return view('guest.logout')->with($data);
    }
    public function postLogout()
    {
        $this->userService->logout();
        if (session('lock_screen')) {
            session(['lock_screen' => false]);
        }
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('logout');
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
        $data = $request->all();
        $result = $this->authService->registerCustomer($data);
        if ($result) {
            return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng xác nhận email để tiếp tục đăng nhập!');
        }
        return redirect()->route('login')->with('error', 'Đăng ký thất bại! Có lỗi xảy ra!');
    }

    //Verify
    public function verifyEmail(VerifyEmailRequest $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');
        $user = $this->authService->verifyEmail($email, $token);
        if ($user && !is_null($user->email_verified_at)) {
            return redirect()->route('login')->with('success', 'Xác nhận email thành công! Đăng nhập để tiếp tục!');
        }
        return redirect()->route('login')->with('error', 'Xác nhận thất bại! Email hoặc token không hợp lệ!');
    }

    //LockScreen
    public function lockScreen()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Đăng nhập',
            'user' => $user,
        ];
        return view('chat.lock-screen')->with($data);
    }

    public function requestLockScreen()
    {
        if (!session('lock_screen')) {
            session(['lock_screen' => true]);
        }
        return redirect()->route('lock_screen');
    }

    public function postLockScreen(OpenLockScreenRequest $request)
    {
        $password = $request->input('password');
        $result = $this->userService->openLockScreen($password);
        if ($result) {
            session(['lock_screen' => false]);
            return redirect()->route('chat');
        }
        return redirect()->route('lock_screen')->with('error', 'Mật khẩu không chính xác, vui lòng thử lại!');
    }
    //Recover
    public function recover()
    {
        $data = [
            'title' => 'Quên mật khẩu',
        ];
        return view('guest.recover')->with($data);
    }
    public function postRecover(RecoverRequest $request)
    {
        $email = $request->input('email');
        $result = $this->authService->recover($email);
        if ($result) {
            return redirect()->route('recover')->with('success', 'Yêu cầu quên mật khẩu thành công, truy cập đường dẫn tại email gửi đến!');
        } else {
            return redirect()->route('recover')->with('error', 'Yêu cầu quên mật khẩu thất bại, có lỗi xảy ra!');
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

        $user = $this->authService->resetPassword($email, $token, $password);
        if ($user) {
            return redirect()->route('login')->with('success', 'Đổi mật khẩu thành công, đăng nhập để tiếp tục!');
        } else {
            return redirect()->route('reset_password')->with('error', 'Đổi mật khẩu thất bại, thử lại!');
        }
    }
}