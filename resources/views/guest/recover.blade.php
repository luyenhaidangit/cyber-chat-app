@extends('guest.layout.app')

@section('content')
    <div class="text-center mb-5">
        <h3>Khôi Phục Mật Khẩu</h3>
        <p class="text-muted">Khôi phục mật khẩu với CyberChat.</p>
    </div>
    <div class="alert alert-info text-center my-4" role="alert">
        Nhập địa chỉ email của bạn và hướng dẫn sẽ được gửi đến bạn!
    </div>
    <form action="{{ route('recover') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary w-100" type="submit">Khôi Phục</button>
        </div>
    </form><!-- end form -->

    <div class="mt-5 text-center text-muted">
        <p>Nhớ mật khẩu? <a href="{{ route('login') }}" class="fw-medium text-decoration-underline">Đăng nhập</a></p>
    </div>
@endsection
