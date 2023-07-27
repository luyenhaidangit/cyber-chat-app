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
                        <li class="breadcrumb-item active">Quản lý cấu hình huỷ CTS</li>
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
                            <a href="{{ route('admin.config_destroy.create') }}" ui-sref="add-category" type="button"
                                class="btn btn-success waves-effect waves-light">
                                Thêm
                                mới</a>
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
                                    <th>Hệ thống</th>
                                    <th>Trạng thái được huỷ</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th style="width: 120px;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($destroyConfigs as $config)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ordercheck1">
                                                <label class="custom-control-label" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);"
                                                class="text-dark font-weight-bold">{{ $config->id }}</a>
                                        </td>
                                        <td>{{ config('constants.services')[$config->service] }}</td>
                                        <td>{{ config('constants.service_status')[$config->service_status] }}</td>
                                        <td>
                                            @if ($config->status === 1)
                                                <div class="badge badge-soft-success font-size-12">Hoạt động</div>
                                            @else
                                                <div class="badge badge-soft-danger font-size-12">Ngừng hoạt động</div>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $config->created_at->format('d/m/Y') }}
                                        </td>
                                        <td>
                                            <a href="#" class="mr-1 text-info" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Chi tiết"><i
                                                    class="mdi mdi-eye font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="mr-1 text-primary" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Sửa"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Xoá"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
