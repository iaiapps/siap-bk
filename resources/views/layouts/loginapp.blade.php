<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Mazer CSS -->
    <link rel="stylesheet" href="{{ asset('assets/mazer/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mazer/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mazer/css/auth.css') }}">

    @stack('css')
</head>

<body>
    <script src="{{ asset('assets/mazer/js/initTheme.js') }}"></script>

    <div id="auth">
        @yield('content')
    </div>

    <script src="{{ asset('assets/mazer/js/dark.js') }}"></script>
    <script src="{{ asset('assets/mazer/js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
