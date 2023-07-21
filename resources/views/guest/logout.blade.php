@extends('guest.layout.app')

@section('content')
    <div class="avatar-xl mx-auto">
        <div class="avatar-title bg-soft-primary text-primary h1 rounded-circle">
            <i class="bx bxs-user"></i>
        </div>
    </div>
    <div class="mt-4 pt-2">
        <h5>Bạn đã đăng xuất</h5>
        <p class="text-muted font-size-15">Cảm ơn bạn đã sử dụng <span class="fw-semibold text-dark">CyberChat</span></p>
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary w-100 waves-effect waves-light">Đăng nhập lại</a>
        </div>
    </div>
@endsection
