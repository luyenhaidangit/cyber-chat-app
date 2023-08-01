@extends('admin.layout.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Quản lý vai trò</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">CyberChat</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.role') }}">Quản lý vai trò</a>
                        </li>
                        <li class="breadcrumb-item active">Xoá vai trò</li>
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
                    @if (session('error'))
                        <div class="alert alert-danger text-center my-4" role="alert">
                            {{ session('error') }}
                        </div>
                    @else
                        <div class="form-horizontal" role="form">
                            <!-- Name -->
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-12 col-form-label">Bạn có chắc muốn xoá vai
                                    trò
                                    <span class="text-danger">{{ $role->name }}</span>?</label>
                            </div>

                            <div class="add-btn mb-2 d-flex justify-content-start" style="gap:12px">
                                <form action="{{ route('admin.role.delete.delete', $role->uuid) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
