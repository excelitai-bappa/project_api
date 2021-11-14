<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Login - Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image.png" href="{{ asset('admin_assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/font-awesome.min.css') }}">

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


    <style>
        .form-check-label {
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
    <!-- login area start -->
    <div class="login-area login-bg" style="background-image: url('{{ asset('admin_assets/images/login_background.jpg')}}');background-position: center; background-size: cover;background-repeat:no-repeat; position: relative; z-index: 1">
        <div class="container">

            <div class="login-box ptb--50">
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    <div class="login-form-head">
                        <h4>Sign In Here</h4>
                    </div>

                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            <div>
                                <p>{{ Session::get('error') }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" id="exampleInputEmail1" name="email" value="{{ old('email') }}">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing"
                                        name="remember">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember
                                        Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- Script -->
    @include('backend.layouts.partials.scripts')
    @yield('scripts')
</body>

</html>
