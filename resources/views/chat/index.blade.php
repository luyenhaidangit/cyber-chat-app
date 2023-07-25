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
@endsection
