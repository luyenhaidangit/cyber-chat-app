@extends('guest.layout.app')

@section('content')
    <div class="text-center mb-5">
        <h3>Xin chào !</h3>
        <p class="text-muted">Đăng nhập để tiếp tục với CyberChat.</p>
    </div>
    @if (session('success'))
        <div class="alert alert-info text-center my-4" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error text-center my-4" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập tên tài khoản">
            @error('email')
                <div class="text-danger mt-1">
                    <span style="font-size: 12px"> {{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <div class="float-end">
                <a href="{{ route('recover') }}" class="text-muted">Quên mật khẩu?</a>
            </div>
            <label for="userpassword" class="form-label">Mật khẩu</label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input type="password" class="form-control pe-5" placeholder="Nhập mật khẩu" id="password-input"
                    name="password">
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button"
                    id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                @error('password')
                    <div class="text-danger mt-1">
                        <span style="font-size: 12px"> {{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-check form-check-info font-size-16">
            <input class="form-check-input" type="checkbox" id="remember-check" name="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label font-size-14" for="remember-check">
                Lưu đăng nhập
            </label>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-primary w-100" type="submit">Đăng nhập</button>
        </div>
        <div class="mt-4 text-center">
            <div class="signin-other-title">
                <h5 class="font-size-14 mb-4 title">Đăng nhập với</h5>
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
        <p>Chưa có tài khoản ? <a href="{{ route('register') }}" class="fw-medium text-decoration-underline"> Đăng ký</a>
        </p>
    </div>
@endsection
