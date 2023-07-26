@extends('admin.layout.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Quản lý người dùng</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">CyberChat</a></li>
                        <li class="breadcrumb-item active">Quản lý người dùng</li>
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
                    <div class="mb-4 d-flex align-items-center">
                        <div class="datatable-add">
                            <button ui-sref="add-category" type="button" class="btn btn-success waves-effect waves-light">
                                Thêm
                                mới</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 d-flex">
                            <label for="search-username" class="col-form-label mr-2">Username</label>
                            <input class="form-control" type="text" placeholder="Tìm kiếm theo username"
                                id="search-username" value="{{ request('username') }}">
                        </div>
                        <div class="col-md-3 d-flex">
                            <label for="search-email" class="col-form-label mr-3">Email</label>
                            <input class="form-control" type="text" placeholder="Tìm kiếm theo email" id="search-email"
                                value="{{ request('email') }}">
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="search-status" class="col-form-label mr-3" style="min-width:68px">Trạng
                                thái</label>
                            <select class="custom-select" id="search-status">
                                <option value="-1" selected="">Chọn trạng thái</option>
                                <option value="1" @if (request('status') == '1') selected @endif>Hoạt động</option>
                                <option value="0" @if (request('status') == '0') selected @endif>Ngừng hoạt động
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5 d-flex">
                            <label for="example-text-input" class="col-form-label mr-1" style="min-width:68px">Vai
                                trò</label>

                            <select class="select2 form-control select2-multiple role-select" multiple="multiple"
                                data-placeholder="Chọn vai trò">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-5 d-flex">
                            <label for="example-text-input" class="col-form-label mr-1" style="min-width:72px">Ngày
                                tạo</label>
                            <div>
                                <div class="input-daterange input-group" data-provide="datepicker"
                                    data-date-format="dd M, yyyy" data-date-autoclose="true">
                                    <input type="datetime" id="start-date" class="form-control" name="start" />
                                    <input type="text" id="end-date" class="form-control" name="end" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex">
                            <button id="search-button" ui-sref="add-category" type="button"
                                class="btn btn-primary waves-effect waves-light">
                                Tìm kiếm</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap "
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ordercheck">
                                            <label class="custom-control-label" for="ordercheck">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th style="width: 120px;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ordercheck1">
                                                <label class="custom-control-label" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);"
                                                class="text-dark font-weight-bold">{{ $user->id }}</a>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>
                                            @if ($user->status === 1)
                                                <div class="badge badge-soft-success font-size-12">Hoạt động</div>
                                            @else
                                                <div class="badge badge-soft-danger font-size-12">Ngừng hoạt động</div>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->created_at->format('d/m/Y') }}
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="mr-1 text-info" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Chi tiết"><i
                                                    class="mdi mdi-eye font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="mr-1 text-primary" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Sửa"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Xoá"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex">
                            @if ($totalRecords > 0)
                                <ul class="pagination pagination-rounded">
                                    {{-- Nút trang trước --}}
                                    <li class="page-item {{ $pageIndex == 1 ? 'disabled' : '' }}"
                                        @if ($pageIndex > 1) data-page-index="{{ $pageIndex - 1 }}" @endif>
                                        @if ($pageIndex > 1)
                                            <span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
                                        @else
                                            <span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
                                        @endif
                                    </li>

                                    {{-- Danh sách các trang --}}
                                    @for ($i = 1; $i <= ceil($totalRecords / $pageSize); $i++)
                                        <li class="page-item {{ $pageIndex == $i ? 'active' : '' }}"
                                            data-page-index="{{ $i }}">
                                            <span class="page-link">{{ $i }}</span>
                                        </li>
                                    @endfor

                                    {{-- Nút trang sau --}}
                                    <li class="page-item {{ $pageIndex == ceil($totalRecords / $pageSize) ? 'disabled' : '' }}"
                                        @if ($pageIndex < ceil($totalRecords / $pageSize)) data-page-index="{{ $pageIndex + 1 }}" @endif>
                                        @if ($pageIndex < ceil($totalRecords / $pageSize))
                                            <span class="page-link"><i class="mdi mdi-chevron-right"></i></span>
                                        @else
                                            <span class="page-link"><i class="mdi mdi-chevron-right"></i></span>
                                        @endif
                                    </li>
                                </ul>
                            @endif

                            <div class="col-sm-6">
                                <div class="dropdown mt-4 mt-sm-0">
                                    <span href="#" class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Số bản ghi: {{ request('pageSize') }}<i class="mdi mdi-chevron-down"></i>
                                    </span>

                                    <div class="dropdown-menu">
                                        <span class="page-size dropdown-item" data-page-size="10">10</span>
                                        <span class="page-size dropdown-item" data-page-size="20">20</span>
                                        <span class="page-size dropdown-item" data-page-size="50">50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //Date search
            var startDateParam = new URLSearchParams(window.location.search).get('startDate');
            var startDateValue = startDateParam ? moment(startDateParam, 'DD-MM-YYYY').format('DD MMM, YYYY') : '';
            $("#start-date").val(startDateValue);
            var endDateParam = new URLSearchParams(window.location.search).get('endDate');
            var endDateValue = endDateParam ? moment(endDateParam, 'DD-MM-YYYY').format('DD MMM, YYYY') : '';
            $("#end-date").val(endDateValue);

            //Roles search
            var rolesParam = new URLSearchParams(window.location.search).get('roles');
            var selectedRoles = rolesParam ? rolesParam.split(',') : [];
            $(".select2-multiple.role-select option").each(function() {
                if (selectedRoles.includes(this.value)) {
                    $(this).prop("selected", true);
                }
            });
            $(".select2-multiple.role-select").select2();

            //Filter
            $("#search-button").click(function() {
                var username = $("#search-username").val();
                var email = $("#search-email").val();
                var status = $("#search-status").val();
                if (status === '-1') {
                    status = null;
                }
                var roles = $(".select2-multiple.role-select option:checked").map(function() {
                    return this.value;
                }).get();
                var startDate = $("#start-date").val();
                var endDate = $("#end-date").val();
                if (startDate) {
                    var startDateFormat = moment(startDate, 'DD MMM, YYYY').format(
                        'DD-MM-YYYY');
                }
                if (endDate) {
                    var endDateFormat = moment(endDate, 'DD MMM, YYYY').format('DD-MM-YYYY');
                }

                var url = new URI(window.location.href);
                var params = url.search(true);

                var newParams = {};

                if (username) newParams.username = username;
                else delete params.username;

                if (email) newParams.email = email;
                else delete params.email;

                if (status) newParams.status = status;
                else delete params.status;

                if (roles.length > 0) newParams.roles = roles.join(',');
                else delete params.roles;

                if (startDate && endDate) {
                    newParams.startDate = startDateFormat;
                    newParams.endDate = endDateFormat;
                } else {
                    delete params.startDate;
                    delete params.endDate;
                }

                params = Object.assign(params, newParams);

                var updatedUrl = url.search(params).toString();
                window.location.href = updatedUrl;
            });

            $('.page-item').on('click', function() {
                var pageIndex = $(this).data('page-index');
                if (pageIndex) {
                    var url = new URI(window.location.href);
                    var params = url.search(true);
                    params.pageIndex = pageIndex;
                    var updatedUrl = url.search(params).toString();
                    window.location.href = updatedUrl;
                }
            });

            $('.page-size').on('click', function() {
                var pageSize = $(this).data('page-size');
                if (pageSize) {
                    var url = new URI(window.location.href);
                    var params = url.search(true);
                    params.pageSize = pageSize;
                    var updatedUrl = url.search(params).toString();
                    window.location.href = updatedUrl;
                }
            });
        });
    </script>
@endsection
