@extends('guest.layout.app')

@section('content')
    <div class="text-center mb-5">
        <h3>Thay Đổi Mật Khẩu</h3>
    </div>
    <div class="user-thumb text-center mb-4">
        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded-circle img-thumbnail avatar-lg"
            alt="ảnh đại diện">
        <h5 class="font-size-15 mt-3">Luyện Hải Đăng</h5>
    </div>
    <form action="{{ route('change_password') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="oldpassword-input" class="form-label">Mật Khẩu Cũ</label>
            <input type="password" class="form-control" id="oldpassword-input" name="old_password"
                placeholder="Nhập Mật Khẩu Cũ">
        </div>

        <div class="mb-3">
            <label for="newpassword-input" class="form-label">Mật Khẩu Mới</label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input type="password" class="form-control pe-5" placeholder="Nhập Mật Khẩu Mới" id="password-input"
                    name="new_password">
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button"
                    id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
            </div>
        </div>
        <div class="mb-3">
            <label for="confirmpassword-input" class="form-label">Xác Nhận Mật Khẩu Mới</label>
            <input type="password" class="form-control" id="confirmpassword-input" name="confirm_password"
                placeholder="Nhập Xác Nhận Mật Khẩu Mới">
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
