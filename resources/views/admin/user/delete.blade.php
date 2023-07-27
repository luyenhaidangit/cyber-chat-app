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
                        <li class="breadcrumb-item active">Xoá người dùng</li>
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
                            <label for="example-text-input" class="col-md-12 col-form-label">Bạn có chắc muốn xoá người dùng
                                <span class="text-danger">{{ $user->username }}</span>?</label>
                        </div>

                        <div class="add-btn mb-2 d-flex justify-content-start" style="gap:12px">
                            <form action="{{ route('admin.user.delete.post', ['uuid' => $user->uuid]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger waves-effect waves-light" type="submit">Xác nhận</button>
                                <a href="{{ route('admin.user') }}" class="btn btn-secondary waves-effect waves-light">Trở
                                    lại</a>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
