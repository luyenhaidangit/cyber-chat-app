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
                        <div class="datatable-add ml-2">
                            <button ui-sref="add-category" type="button" class="btn btn-success waves-effect waves-light">
                                Thêm
                                mới</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 d-flex">
                            <label for="example-text-input" class="col-form-label mr-5">Tên</label>
                            <input class="form-control" type="text" placeholder="Tìm kiếm theo tên"
                                id="example-text-input">
                        </div>
                        <div class="col-md-3 d-flex">
                            <label for="example-text-input" class="col-form-label mr-3">Email</label>
                            <input class="form-control" type="text" placeholder="Tìm kiếm theo email"
                                id="example-text-input">
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="example-text-input" class="col-form-label mr-3" style="min-width:68px">Trạng
                                thái</label>
                            <select class="custom-select">
                                <option selected="">Chọn trạng thái</option>
                                <option value="1">Hoạt động</option>
                                <option value="2">Ngừng hoạt động</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 d-flex">
                            <label for="example-text-input" class="col-form-label mr-1" style="min-width:68px">Vai
                                trò</label>

                            <select class="select2 form-control select2-multiple" multiple="multiple"
                                data-placeholder="Chọn vai trò">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 d-flex">
                            <label for="example-text-input" class="col-form-label mr-1" style="min-width:68px">Ngày
                                tạo</label>
                            <div>
                                <div class="input-daterange input-group" data-provide="datepicker"
                                    data-date-format="dd M, yyyy" data-date-autoclose="true">
                                    <input type="text" class="form-control" name="start" />
                                    <input type="text" class="form-control" name="end" />
                                </div>
                            </div>
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
                                    {{-- <th>Ảnh đại diện</th> --}}
                                    <th>Email</th>
                                    <th style="min-width: 80px">Họ tên</th>
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
                                        {{-- <td class="d-flex justify-content-center">
                                            <img src="{{ $user->avatar }}" height="40" />
                                        </td> --}}
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->full_name }}</td>
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
                        @if ($totalRecords > 0)
                            <ul class="pagination pagination-rounded">
                                {{-- Nút trang trước --}}
                                <li class="page-item {{ $pageIndex == 1 ? 'disabled' : '' }}">
                                    @if ($pageIndex > 1)
                                        <a class="page-link"
                                            href="{{ route('admin.user', ['pageIndex' => $pageIndex - 1, 'pageSize' => $pageSize]) }}"><i
                                                class="mdi mdi-chevron-left"></i></a>
                                    @else
                                        <span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
                                    @endif
                                </li>

                                {{-- Danh sách các trang --}}
                                @for ($i = 1; $i <= ceil($totalRecords / $pageSize); $i++)
                                    <li class="page-item {{ $pageIndex == $i ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ route('admin.user', ['pageIndex' => $i, 'pageSize' => $pageSize]) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Nút trang sau --}}
                                <li
                                    class="page-item {{ $pageIndex == ceil($totalRecords / $pageSize) ? 'disabled' : '' }}">
                                    @if ($pageIndex < ceil($totalRecords / $pageSize))
                                        <a class="page-link"
                                            href="{{ route('admin.user', ['pageIndex' => $pageIndex + 1, 'pageSize' => $pageSize]) }}"><i
                                                class="mdi mdi-chevron-right"></i></a>
                                    @else
                                        <span class="page-link"><i class="mdi mdi-chevron-right"></i></span>
                                    @endif
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
