<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('image/favicon.ico') }}" type="image/x-icon">
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @include('admin/template_admin/styles')
    @yield('page_admin_styles')
</head>

<body>

    <div class="page">
        @include('admin/template_admin/header')
        @include('admin/template_admin/sidebar')
        @yield('content_admin')
    </div>

    @include('admin/template_admin/scripts')
    @yield('template_admin_scripts')
</body>

</html>
