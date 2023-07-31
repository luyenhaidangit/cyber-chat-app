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
                        <li class="breadcrumb-item active">Sửa người dùng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('admin.user.edit.post') }}" method="POST" enctype="multipart/form-data"
                    class="card-body">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger text-center my-4" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group row">
                        <input hidden name="id" required ng-maxlength="500" class="form-control" type="text"
                            value="{{ $user->id }}">
                        <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                        <div class="col-md-10">
                            <input ng-model="product.Name" name="username" required ng-maxlength="500" class="form-control"
                                type="text" value="{{ $user->username }}">
                            @error('username')
                                <div class="text-danger mt-1">
                                    <span style="font-size: 12px"> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Họ và tên</label>
                        <div class="col-md-10">
                            <input ng-model="product.Name" name="full_name" required ng-maxlength="500" class="form-control"
                                type="text" value="{{ $user->full_name }}">
                            @error('full_name')
                                <div class="text-danger mt-1">
                                    <span style="font-size: 12px"> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input ng-model="product.Name" name="email" required ng-maxlength="500" class="form-control"
                                type="text" value="{{ $user->email }}">
                            @error('email')
                                <div class="text-danger mt-1">
                                    <span style="font-size: 12px"> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Ảnh đại diện</label>
                        <input style="padding-top: 8.25px; padding-left:12px" ng-model="product.Name" name="avatarFile"
                            type="file" value="">
                        @error('avatar')
                            <div class="text-danger mt-1">
                                <span style="font-size: 12px"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Mật khẩu</label>
                        <div class="col-md-10">
                            <input ng-model="product.Name" name="password" required ng-maxlength="500" class="form-control"
                                type="text" value="">
                            @error('password')
                                <div class="text-danger mt-1">
                                    <span style="font-size: 12px"> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Quyền</label>
                        <div class="col-md-10">
                            <select class="select2 form-control select2-multiple role-select" multiple="multiple"
                                data-placeholder="Chọn vai trò" name="roles[]">
                                @foreach ($roles as $role)
                                    <option @if ($user->roles->contains('id', $role->id)) selected @endif value="{{ $role->id }}">
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row pl-2">
                        <div class="custom-control custom-switch mb-2" dir="ltr">
                            <input type="hidden" name="status" value="0" />
                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1"
                                @if ($user->status === 1) value="1" @endif
                                @if ($user->status === 1) checked @endif>
                            <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                        </div>
                        @error('status')
                            <div class="text-danger mt-1">
                                <span style="font-size: 12px"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="add-btn mb-2 d-flex justify-content-end" style="gap:12px">
                        <a href="{{ route('admin.user') }}" class="btn btn-secondary waves-effect waves-light">Trở
                            lại</a>
                        <button class="btn btn-success waves-effect waves-light" type="submit">Xác
                            nhận</button>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
