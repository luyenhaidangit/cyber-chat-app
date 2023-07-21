<!doctype html>
<html lang="en">

<head>
    @include('guest.layout.head')
</head>

<body>
    <div class="auth-bg">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xl-3 col-lg-4">
                    <div class="p-4 pb-0 p-lg-5 pb-lg-0 auth-logo-section">
                        <div class="text-white-50">
                            <h3><a href="{{ route('login') }}" class="text-white"><i
                                        class="bx bxs-message-alt-detail align-middle text-white h3 mb-1 me-2"></i>
                                    CyberChat</a></h5>
                                <p class="font-size-16">Ứng dụng nhắn tin trực tuyến</p>
                        </div>
                        <div class="mt-auto">
                            <img src={{ asset('assets/images/auth-img.png') }} alt="" class="auth-img">
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-xl-9 col-lg-8">
                    <div class="authentication-page-content">
                        <div class="d-flex flex-column h-100 px-4 pt-4">
                            <div class="row justify-content-center my-auto">
                                <div class="col-sm-8 col-lg-6 col-xl-5 col-xxl-4">

                                    <div class="py-md-5 py-4">

                                        @yield('content')

                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="text-center text-muted p-4">
                                        <p class="mb-0">&copy;
                                            2023 CyberChat. Bản quyền thuộc <i class="mdi mdi-heart text-danger"></i>
                                            CyberLotus
                                        </p>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    @include('guest.layout.script')
</body>

</html>
