<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image.png" href="{{ asset('admin_assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/slicknav.min.css') }}">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/responsive.css') }}">

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

    <!-- Select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- modernizr css -->
    <script src="{{ asset('admin_assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <style>
        .form-check-label{
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

        @include('backend.layouts.partials.sidebar')

        <!-- main content area start -->
        <div class="main-content">

            @include('backend.layouts.partials.header')

            @yield('admin-content')

        </div>
        <!-- main content area end -->


        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2021. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- Setting area start -->

    @include('backend.layouts.partials.setting')

    <!-- Setting area end -->

    @include('backend.layouts.partials.scripts')
    @yield('scripts')


</body>

</html>
