@extends('guest.layout.app')

@section('content')
    <div class="text-center mb-5">
        <h3>Thay Đổi Mật Khẩu</h3>
    </div>
    @if (session('error'))
        <div class="alert alert-error text-center my-4" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="user-thumb text-center mb-4">
        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded-circle img-thumbnail avatar-lg"
            alt="ảnh đại diện">
        <h5 class="font-size-15 mt-3">{{ request('email') }}</h5>
    </div>
    <form action="{{ route('reset_password.post') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ request('email') }}">
        <input type="hidden" name="token" value="{{ request('token') }}">
        <div class="mb-3">
            <label for="password" class="form-label">Mật Khẩu Mới</label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input type="password" class="form-control pe-5" placeholder="Nhập Mật Khẩu Mới" id="password-input"
                    name="password">
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button"
                    id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
            </div>
        </div>

        <div class="text-center mt-4">
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary w-100" type="submit">Lưu</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-light w-100" type="button">Hủy</button>
                </div>
            </div>
        </div>
    </form>
@endsection
