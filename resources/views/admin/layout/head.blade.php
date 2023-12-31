<meta charset="utf-8" />
<title>Starter page | Nazox - Responsive Bootstrap 4 Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesdesign" name="author" />
<link rel="canonical" href="{{ asset('') }}" data-url="{{ asset('') }}">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets-1/images/favicon.ico') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap Css -->
<link href="{{ asset('assets-1/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('assets-1/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
{{-- Lib css --}}
<link href="{{ asset('assets-1/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets-1/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<!-- App Css-->
<link href="{{ asset('assets-1/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets-1/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<style>
    .custom-checkbox.custom-element .custom-control-input:checked~.custom-control-label::after {
        background-image: none;
        content: "-";
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        padding: 4px;
    }

    .cursor-pointer {
        cursor: pointer !important;
    }
</style>
