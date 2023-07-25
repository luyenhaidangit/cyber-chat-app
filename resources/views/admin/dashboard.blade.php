@extends('admin.layout.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Starter page</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                        <li class="breadcrumb-item active">Starter page</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('logout.post') }}" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
    <!-- end page title -->
@endsection
