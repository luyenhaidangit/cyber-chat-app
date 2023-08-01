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
                        <li class="breadcrumb-item active">Sửa vai trò</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('admin.role.edit.post') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <input hidden class="custom-control-input" id="{{ $role->id }}" name="id">
                        @if (session('error'))
                            <div class="alert alert-danger text-center my-4" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            <input hidden name="id" required ng-maxlength="500" class="form-control" type="text"
                                value="{{ $role->id }}">
                            <label for="example-text-input" class="col-md-2 col-form-label">Tên quyền</label>
                            <div class="col-md-10">
                                <input readonly ng-model="product.Name" name="name" required ng-maxlength="500"
                                    class="form-control" type="text" value="{{ $role->name }}">
                                @error('name')
                                    <div class="text-danger mt-1">
                                        <span style="font-size: 12px"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Mô tả</label>
                            <div class="col-md-10">
                                <input readonly ng-model="product.Name" name="description" required ng-maxlength="500"
                                    class="form-control" type="text" value="{{ $role->description }}">
                                @error('description')
                                    <div class="text-danger mt-1">
                                        <span style="font-size: 12px"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Danh sách quyền</label>
                        </div>
                        <div class="form-group row">
                            <ul id="permission" class="col-md-10">
                                @foreach ($permissions as $permission)
                                    <li style="list-style: none;">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input disabled value="{{ $permission->id }}" type="checkbox"
                                                class="custom-control-input" id="{{ $permission->id }}"
                                                name="permissions[]" @if (in_array($permission->id, $rolePermissions)) checked @endif>
                                            <label class="custom-control-label"
                                                for="{{ $permission->id }}">{{ $permission->name }}</label>
                                            <i class="fas fa-angle-down cursor-pointer" data-toggle="collapse"
                                                data-target="#collapseExample-{{ $permission->id }}" aria-expanded="false"
                                                aria-controls="collapseExample-{{ $permission->id }}"></i>
                                        </div>
                                    </li>
                                    @if ($permission->children->isNotEmpty())
                                        @include('admin.role.detail-item', [
                                            'children' => $permission->children,
                                            'code' => $permission->id,
                                        ])
                                    @endif
                                @endforeach
                                @error('description')
                                    <div class="text-danger mt-1">
                                        <span style="font-size: 12px">{{ $message }}</span>
                                    </div>
                                @enderror
                            </ul>
                        </div>
                        <div class="add-btn mb-2 d-flex justify-content-end" style="gap:12px">
                            <a href="{{ route('admin.role') }}" class="btn btn-secondary waves-effect waves-light">Trở
                                lại</a>
                            <button class="btn btn-success waves-effect waves-light" type="submit">Xác
                                nhận</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var parentDivs = $('#permission .custom-control-input');

        console.log(parentDivs)

        parentDivs.each(function() {
            var ul = $(this).closest('li').next('ul');

            var areAllChecked = $(this).closest('ul').find('> li input.custom-control-input:checked').length === $(
                this).closest('ul').find('> li input.custom-control-input').length;

            var isAtLeastOneChecked = $(this).closest('ul').find('> li input.custom-control-input:checked').length;

            if (areAllChecked) {

            } else {
                if (isAtLeastOneChecked > 0) {
                    $(this).parents('ul').prev('li').find('.custom-checkbox').addClass('custom-element');
                    $(this).parents('ul').prev('li').find('input.custom-control-input').prop('checked', true);
                } else {
                    $(this).parents('ul').prev('li').find('.custom-checkbox').removeClass('custom-element');
                    $(this).parents('ul').prev('li').find('input.custom-control-input').prop('checked', false);
                }
            }
        });

        $('input.custom-control-input').on('change', function() {
            var ul = $(this).closest('li').next('ul');

            var isChecked = $(this).prop('checked');

            ul.find('input.custom-control-input').prop('checked', isChecked);
            ul.find('>li .custom-checkbox').removeClass('custom-element');

            var areAllChecked = $(this).closest('ul').find('> li input.custom-control-input:checked').length === $(
                this).closest('ul').find('> li input.custom-control-input').length;

            var areAllAll = true;
            $(this).closest('ul').find('> li .custom-checkbox').each(function() {
                if ($(this).hasClass('custom-element')) {
                    areAllAll = false;
                    return false;
                }
            });

            var isAtLeastOneChecked = $(this).closest('ul').find('> li input.custom-control-input:checked').length;

            if (areAllChecked && areAllAll) {
                $(this).parents('ul').prev('li').find('.custom-checkbox').removeClass('custom-element');
                $(this).parents('ul').prev('li').find('input.custom-control-input').prop('checked', true);
            } else {
                if (isAtLeastOneChecked > 0) {
                    $(this).parents('ul').prev('li').find('.custom-checkbox').addClass('custom-element');
                    $(this).parents('ul').prev('li').find('input.custom-control-input').prop('checked', true);
                } else {
                    $(this).parents('ul').prev('li').find('.custom-checkbox').removeClass('custom-element');
                    $(this).parents('ul').prev('li').find('input.custom-control-input').prop('checked', false);
                }
            }
        });
    </script>
@endsection
