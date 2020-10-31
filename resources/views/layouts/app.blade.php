<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div class="app">
    @guest
    @else
        @include('layouts.nav-bar')
    @endguest
</div>
@yield('content')
@if(config('app.env') == 'local')
    <script src="http://localhost:35729/livereload.js"></script>
@endif
<script>
    function dropdown() {
        var element = document.getElementById("droped_target");
        element.classList.toggle("hidden");
    }
</script>
</body>
</html>
