<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Mazer CSS -->
    <link rel="stylesheet" href="{{ asset('assets/mazer/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mazer/css/app-dark.css') }}">

    @stack('css')
</head>

<body>
    <script src="{{ asset('assets/mazer/js/initTheme.js') }}"></script>

    <div id="app">
        <div id="sidebar">
            @include('layouts.partials.sidemenu')
        </div>
        <div id="main">
            @include('layouts.partials.header')

            @include('layouts.partials.title')

            @yield('content')

            @include('layouts.partials.footer')
        </div>
    </div>

    <script src="{{ asset('assets/mazer/js/dark.js') }}"></script>
    <script src="{{ asset('assets/mazer/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/mazer/js/app.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery-3.6.4.min.js') }}"></script>
    @include('layouts.partials.scripts')
    @stack('scripts')
</body>

</html>
