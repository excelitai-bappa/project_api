<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image.png" href="{{ asset('admin_assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap.min.css') }}">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/responsive.css') }}">

    <!-- Select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- modernizr css -->
    <script src="{{ asset('admin_assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <style>
        .form-check-label {
            text-transform: capitalize;
        }

    </style>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- error area start -->
    <div class="error-area ptb--50 text-center">
        <div class="container">
            <div class="error-content">
                @yield('error-content')
            </div>
        </div>
    </div>
    <!-- error area end -->

    <!-- jquery latest version -->
    @include('backend.layouts.partials.scripts')
    @yield('scripts')
</body>

</html>
