<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Direktori UMKM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets_admin/images/icons/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_admin/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/main.css') }}">

</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ url('auth/_register') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Registrasi Direktori UMKM
                    </span>

                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="name">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Nama</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Registrasi Disini
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>

                </form>

                <div class="login100-more"
                    style="background-image: url('{{ asset('assets_admin/images/bg-login.png') }}');">
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets_admin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('assets_admin/js/main.js') }}"></script>

</body>

</html>
