<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    {{-- include header --}}
    @include('admin.layout.styles')

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include("admin.layout.header")
    <!-- Left side column. contains the logo and sidebar -->
@include("admin.layout.left_sidebar")
    <!-- Content Wrapper. Contains page content -->
    <!-- /.content-wrapper -->
    @section("content")
    @show
    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include("admin.layout.footer")
{{-- include Footer --}}
@include("admin.layout.scripts")

@yield('categoryscript')
@yield('dashboard')
@yield('datatable')
@yield('userinfo')
@yield('create')
</body>
</html>
