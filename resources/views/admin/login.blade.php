@extends('admin.layout.app-auth')

@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div>
    <div>
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4">
                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                        <div class="w-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div>
                                        <div class="text-center">
                                            <div>
                                                <a href="index.html" class="logo"><img
                                                        src="{{ asset('assets-1/images/logo-dark.png') }}" height="20"
                                                        alt="logo"></a>
                                            </div>

                                            <h4 class="font-size-18 mt-4">Chào mừng !</h4>
                                            <p class="text-muted">Đăng nhập để tiếp tục truy cập CyberChat.</p>
                                        </div>

                                        <div class="p-2 mt-5">
                                            <form class="form-horizontal" action="index.html">

                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                    <label for="username">Email</label>
                                                    <input type="text" class="form-control" id="username"
                                                        placeholder="Enter username">
                                                </div>

                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                    <label for="userpassword">Mật khẩu</label>
                                                    <input type="password" class="form-control" id="userpassword"
                                                        placeholder="Nhập mật khẩu">
                                                </div>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customControlInline">
                                                    <label class="custom-control-label" for="customControlInline">Duy trì
                                                        đăng nhập</label>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <button class="btn btn-primary w-md waves-effect waves-light"
                                                        type="submit">Đăng nhập</button>
                                                </div>

                                                {{-- <div class="mt-4 text-center">
                                                    <a href="auth-recoverpw.html" class="text-muted"><i
                                                            class="mdi mdi-lock mr-1"></i> Quên mật khẩu?</a>
                                                </div> --}}
                                            </form>
                                        </div>

                                        {{-- <div class="mt-5 text-center">
                                            <p>Chưa có tài khoản ? <a href="auth-register.html"
                                                    class="font-weight-medium text-primary"> Đăng ký </a> </p>
                                            <p>© 2023 CyberChat. Thiết kế bởi CyberChat <i
                                                    class="mdi mdi-heart text-danger"></i></p>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="authentication-bg">
                        <div class="bg-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
