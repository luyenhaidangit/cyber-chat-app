@extends('guest.layout.app')

@section('content')
    <div class="text-center mb-5">
        <h3>Thay Đổi Mật Khẩu</h3>
    </div>
    @if (session('error'))
        <div class="alert alert-danger text-center my-4" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="user-thumb text-center mb-4">
        @if (auth()->user()->avatar)
            <img src="{{ Storage::url(auth()->user()->avatar) }}" class="rounded-circle img-thumbnail avatar-lg"
                alt="ảnh đại diện">
        @else
            <img src="{{ asset('assets-1/images/user.png') }}" class="rounded-circle img-thumbnail avatar-lg"
                alt="ảnh đại diện">
        @endif
        <h5 class="font-size-15 mt-3">{{ request('email') }}</h5>
    </div>
    <form action="{{ route('customer.change_password.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">Nhập mật khẩu cũ</label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input type="password" class="form-control pe-5" placeholder="Nhập mật khẩu cũ" id="password-input"
                    name="old_password">
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button"
                    id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                @error('old_password')
                    <div class="text-danger mt-1">
                        <span style="font-size: 12px"> {{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật mật khẩu mới</label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input type="password" class="form-control pe-5" placeholder="Nhập mật khẩu mới" id="password-input-1"
                    name="new_password">
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button"
                    id="password-addon-1"><i class="ri-eye-fill align-middle"></i></button>
                @error('new_password')
                    <div class="text-danger mt-1">
                        <span style="font-size: 12px"> {{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <div class="text-center mt-4">
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary w-100" type="submit">Lưu</button>
                </div>
                <div class="col-6">
                    <a href="{{ route('chat') }}" class="btn btn-light w-100" type="button">Hủy</a>
                </div>
            </div>
        </div>
    </form>
@endsection
