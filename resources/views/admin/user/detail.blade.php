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
                        <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Quản lý người dùng</a>
                        </li>
                        <li class="breadcrumb-item active">Chi tiết người dùng</li>
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
                    <form class="form-horizontal" role="form">
                        <!-- Name -->
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-10 col-form-label">
                                {{ $user->username }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10 col-form-label">
                                {{ $user->email }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Họ và tên</label>
                            <div class="col-md-10 col-form-label">
                                {{ $user->full_name }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Trạng thái</label>
                            <div class="col-md-10 col-form-label">
                                @if ($user->status === 1)
                                    <div class="badge badge-soft-success font-size-12">Hoạt động</div>
                                @else
                                    <div class="badge badge-soft-danger font-size-12">Ngừng hoạt động</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Ngày tạo</label>
                            <div class="col-md-10 col-form-label">
                                {{ $user->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                        <div class="add-btn mb-2 d-flex justify-content-end" style="gap:12px">
                            <a href="{{ route('admin.user') }}" class="btn btn-secondary waves-effect waves-light">Trở
                                lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
