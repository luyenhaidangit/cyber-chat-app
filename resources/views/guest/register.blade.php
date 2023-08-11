@extends('guest.layout.app')

@section('content')
    <div class="text-center mb-5">
        <h3>Đăng Ký Tài Khoản</h3>
        <p class="text-muted">Nhận tài khoản CyberChat miễn phí của bạn ngay bây giờ.</p>
    </div>
    <form class="needs-validation" novalidate action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nhập họ và tên" required>
            @error('full_name')
                <div class="text-danger mt-1">
                    <span style="font-size: 12px"> {{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="useremail" class="form-label">Email</label>
            <input type="email" class="form-control" id="useremail" name="email" placeholder="Nhập email" required>
            @error('email')
                <div class="text-danger mt-1">
                    <span style="font-size: 12px"> {{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Tên tài khoản</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên tài khoản"
                required>
            @error('username')
                <div class="text-danger mt-1">
                    <span style="font-size: 12px"> {{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="userpassword" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Nhập mật khẩu"
                required>
            @error('password')
                <div class="text-danger mt-1">
                    <span style="font-size: 12px"> {{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <p class="mb-0">Bằng cách đăng ký, bạn đồng ý với <a href="javascript:void(0)" class="text-primary">Điều khoản
                    sử
                    dụng</a> của CyberChat</p>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Đăng Ký</button>
        </div>
        <div class="mt-4 text-center">
            <div class="signin-other-title">
                <h5 class="font-size-14 mb-4 title">Đăng ký bằng</h5>
            </div>
            <div class="row">
                <div class="col-6">
                    <div>
                        <button type="button" class="btn btn-light w-100" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-placement="top" title="Facebook"><i class="mdi mdi-facebook text-indigo"></i></button>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <button type="button" class="btn btn-light w-100" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-placement="top" title="Google"><i class="mdi mdi-google text-danger"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form><!-- end form -->

    <div class="mt-5 text-center text-muted">
        <p>Đã có tài khoản? <a href="{{ route('login') }}" class="fw-medium text-decoration-underline">Đăng nhập</a></p>
    </div>
@endsection
