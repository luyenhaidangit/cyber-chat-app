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
                        <li class="breadcrumb-item active">Thêm vai trò</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('admin.role.create.post') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger text-center my-4" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Tên vai trò</label>
                            <div class="col-md-10">
                                <input ng-model="product.Name" name="name" ng-maxlength="500" class="form-control"
                                    type="text">
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
                                <input ng-model="product.Name" name="description" required ng-maxlength="500"
                                    class="form-control" type="text">
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
                            <ul class="col-md-10">
                                @foreach ($permissions as $permission)
                                    <li style="list-style: none;">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input value="{{ $permission->id }}" type="checkbox"
                                                class="custom-control-input" id="{{ $permission->id }}"
                                                name="permissions[]">
                                            <label class="custom-control-label"
                                                for="{{ $permission->id }}">{{ $permission->name }}</label>
                                            <i class="fas fa-angle-down cursor-pointer" data-toggle="collapse"
                                                data-target="#collapseExample-{{ $permission->id }}" aria-expanded="false"
                                                aria-controls="collapseExample-{{ $permission->id }}"></i>
                                        </div>
                                    </li>
                                    @if ($permission->children->isNotEmpty())
                                        @include('admin.role.item', [
                                            'children' => $permission->children,
                                            'code' => $permission->id,
                                        ])
                                    @endif
                                @endforeach
                                @error('description')
                                    <div class="text-danger mt-1">
                                        <span style="font-size: 12px"> {{ $message }}</span>
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
        $('input.custom-control-input').on('change', function() {
            // Tìm thẻ ul tiếp theo của li cha
            var ul = $(this).closest('li').next('ul');

            // Kiểm tra trạng thái của input checkbox hiện tại
            var isChecked = $(this).prop('checked');

            // Đánh dấu chọn/tắt các input checkbox trong ul con
            ul.find('input.custom-control-input').prop('checked', isChecked);
            ul.find('>li .custom-checkbox').removeClass('custom-element');

            // Tìm thẻ li cha
            var areAllChecked = $(this).closest('ul').find('> li input.custom-control-input:checked').length === $(
                this).closest('ul').find('> li input.custom-control-input').length;

            var isAtLeastOneChecked = $(this).closest('ul').find('> li input.custom-control-input:checked').length;

            if (areAllChecked) {
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
