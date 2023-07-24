@extends('chat.layout.app')

@section('content')
    Đăng nhập thành công {{ Auth::user()->email }}
@endsection
