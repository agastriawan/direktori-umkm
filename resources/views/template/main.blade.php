<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Direktori UMKM</title>
    @include('template/styles')
    @yield('page_admin_styles')
</head>

<body>

        @include('template/header')
        @yield('content')
        @include('template/footer')

    @include('template/scripts')
    @yield('template_scripts')
</body>

</html>
