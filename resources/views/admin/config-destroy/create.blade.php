@extends('admin.layout.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Quản lý cấu hình huỷ CTS</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">CyberChat</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.config_destroy') }}">Quản lý cấu hình huỷ CTS</a>
                        </li>
                        <li class="breadcrumb-item active">Thêm cấu hình huỷ CTS</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div className="form-group row">
                        <label htmlFor="example-text-input" class="pl-0 col-md-10 col-form-label">Cấu hình cho phép huỷ yêu
                            cầu
                            chứng thư số</label>
                        <div class="main-config-destroy mb-4">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Cho phép khách hàng huỷ cầu CTS</span>
                                <div class="custom-control custom-switch mb-2" dir="ltr">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </div>
                            <div class="body-config-destroy border rounded p-2">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="pl-3 mr-2">Trạng thái được huỷ</span>
                                    <select class="custom-select col-3">
                                        <option selected="">Lựa chọn trạng thái được huỷ</option>
                                        <option value="1">Chờ xử lý CTS</option>
                                        <option value="2">Chờ duyệt CTS</option>
                                        <option value="3">Chờ gen CTS</option>
                                        <option value="4">Hoàn thành CTS</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="pl-3 mr-2">Tiền phạt khi huỷ</span>
                                    <span class="mr-2 ml-3">Từ ngày</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Đến ngày</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Kể từ ngày</span>
                                    <select class="custom-select mr-2" style="width: 120px">
                                        <option selected="">Lựa chọn thời gian</option>
                                        <option value="1">Đăng ký dịch vụ</option>
                                        <option value="2">Gen CTS</option>
                                        <option value="3">Ngày hiệu lực</option>
                                        <option value="4">Ngày duyệt yêu cầu CTS</option>
                                    </select>
                                    <select class="custom-select mr-2" style="width: 120px">
                                        <option selected="">Kiểu phạt</option>
                                        <option value="1">Số tiền VND</option>
                                        <option value="2">Số tiền %</option>
                                    </select>
                                    <span class="mr-2">Tiền phạt</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Tối thiểu</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Xoá"><i
                                            class="mdi mdi-trash-can font-size-18"></i></a>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="pl-3 mr-2">Tiền phạt khi huỷ</span>
                                    <span class="mr-2 ml-3">Từ ngày</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Đến ngày</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Kể từ ngày</span>
                                    <select class="custom-select mr-2" style="width: 120px">
                                        <option selected="">Lựa chọn thời gian</option>
                                        <option value="1">Đăng ký dịch vụ</option>
                                        <option value="2">Gen CTS</option>
                                        <option value="3">Ngày hiệu lực</option>
                                        <option value="4">Ngày duyệt yêu cầu CTS</option>
                                    </select>
                                    <select class="custom-select mr-2" style="width: 120px">
                                        <option selected="">Kiểu phạt</option>
                                        <option value="1">Số tiền VND</option>
                                        <option value="2">Số tiền %</option>
                                    </select>
                                    <span class="mr-2">Tiền phạt</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Tối thiểu</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Xoá"><i
                                            class="mdi mdi-trash-can font-size-18"></i></a>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="pl-3 mr-2">Tiền phạt khi huỷ</span>
                                    <span class="mr-2 ml-3">Từ ngày</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Đến ngày</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Kể từ ngày</span>
                                    <select class="custom-select mr-2" style="width: 120px">
                                        <option selected="">Lựa chọn thời gian</option>
                                        <option value="1">Đăng ký dịch vụ</option>
                                        <option value="2">Gen CTS</option>
                                        <option value="3">Ngày hiệu lực</option>
                                        <option value="4">Ngày duyệt yêu cầu CTS</option>
                                    </select>
                                    <select class="custom-select mr-2" style="width: 120px">
                                        <option selected="">Kiểu phạt</option>
                                        <option value="1">Số tiền VND</option>
                                        <option value="2">Số tiền %</option>
                                    </select>
                                    <span class="mr-2">Tiền phạt</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Tối thiểu</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Xoá"><i
                                            class="mdi mdi-trash-can font-size-18"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="main-config-destroy mb-2">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Cho phép khách hàng huỷ cầu CTS</span>
                                <div class="custom-control custom-switch mb-2" dir="ltr">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </div>
                            <div class="body-config-destroy border rounded p-2">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="pl-3 mr-2">Trạng thái được huỷ</span>
                                    <select class="custom-select col-3">
                                        <option selected="">Lựa chọn trạng thái được huỷ</option>
                                        <option value="1">Chờ xử lý CTS</option>
                                        <option value="2">Chờ duyệt CTS</option>
                                        <option value="3">Chờ gen CTS</option>
                                        <option value="4">Hoàn thành CTS</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="pl-3 mr-2">Tiền phạt khi huỷ</span>
                                    <span class="mr-2 ml-3">Từ ngày</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Đến ngày</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Kể từ ngày</span>
                                    <select class="custom-select mr-2" style="width: 120px">
                                        <option selected="">Lựa chọn thời gian</option>
                                        <option value="1">Đăng ký dịch vụ</option>
                                        <option value="2">Gen CTS</option>
                                        <option value="3">Ngày hiệu lực</option>
                                        <option value="4">Ngày duyệt yêu cầu CTS</option>
                                    </select>
                                    <select class="custom-select mr-2" style="width: 120px">
                                        <option selected="">Kiểu phạt</option>
                                        <option value="1">Số tiền VND</option>
                                        <option value="2">Số tiền %</option>
                                    </select>
                                    <span class="mr-2">Tiền phạt</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <span class="mr-2">Tối thiểu</span>
                                    <input class="form-control mr-2" style="width: 48px" type="text">
                                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Xoá"><i
                                            class="mdi mdi-trash-can font-size-18"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Thêm cấu hình huỷ CTS</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
