@extends('guest.layout.app')

@section('content')
    <div class="text-center mb-5">
        <h3>Khóa Màn Hình</h3>
        <p class="text-muted">Nhập mật khẩu để mở khóa màn hình!</p>
    </div>
    <div class="user-thumb text-center mb-4">
        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded-circle img-thumbnail avatar-lg"
            alt="ảnh đại diện">
        <h5 class="font-size-15 mt-3">{{ $user->email }}</h5>
    </div>
    <form action="{{ route('lock_screen.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="userpassword">Mật Khẩu</label>
            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Nhập mật khẩu">
            @error('password')
                <div class="text-danger mt-1">
                    <span style="font-size: 12px"> {{ $message }}</span>
                </div>
            @enderror
            @if (session('error'))
                <div class="text-danger mt-1">
                    <span style="font-size: 12px">{{ session('error') }}</span>
                </div>
            @endif
        </div>
        <div class="mb-3 mt-4">
            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Mở Khóa</button>
        </div>
    </form><!-- end form -->

    <div class="mt-5 text-center text-muted">
        <div>
            Không phải bạn?
            <form class="d-inline" action="{{ route('logout.post') }}" method="POST">
                @csrf
                <button type="submit" class="btn text-primary px-0 fw-medium text-decoration-underline">Đăng
                    xuất</button>
            </form>
        </div>
    </div>
@endsection
