<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Direktori UMKM</title>
    @include('template/styles')
    @yield('page_admin_styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        span {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>

</head>

<body>

    @include('template/header')
    @yield('content')
    @include('template/footer')

    @include('template/scripts')
    @yield('template_scripts')
</body>

</html>
