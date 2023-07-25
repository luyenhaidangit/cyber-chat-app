@extends('chat.layout.app')

@section('content')
    Đăng nhập thành công {{ Auth::user()->email }}
    <form action="{{ route('logout.post') }}" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
    <form action="{{ route('request_lock_screen') }}" method="POST">
        @csrf
        <button type="submit">Khoá đăng nhập</button>
    </form>
    @if (session('lock_screen'))
        <div class="text-danger mt-1">
            <span style="font-size: 12px">{{ session('lock_screen') }}</span>
        </div>
    @endif
@endsection
