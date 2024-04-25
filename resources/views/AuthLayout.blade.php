<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('src/css/font-awesome/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('src/css/ionicons/ionicons.min.css') }}">
    <link href="{{ asset('src/css/alert.css') }}" rel="stylesheet">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('src/css/tempusdominus/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('src/css/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('src/css/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('src/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('src/css/overlayScrollbars/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('src/css/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('src/css/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/css/select2/select2.css') }}">

    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

</head>

<body class="">
    <section class="vh-100">
        <div class="container-fluid h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
           @yield('content')
            </div>
          </div>
        </div>
       
      </section>
    @stack('addon-script')
</body>

</html>
