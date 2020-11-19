<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @include('layouts.styles')
    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
</head>
<body class="font-sans antialiased">
<div class="" id="app">
    @livewire('navigation-dropdown')

    <!-- Page Content -->
    <main class="">
        <div class="main-wrapper">
            <br><br><br><br>
            {{ $slot }}
        </div>
    </main>
</div>

@stack('modals')
@livewireScripts
{{--@if(config('app.env') == 'local')--}}
{{--    <script src="http://localhost:35729/livereload.js"></script>--}}
{{--    <script src="http://127.0.0.1:35729/livereload.js"></script>--}}
{{--@endif--}}
@include('layouts.scripts')
<script src="js/app.js"></script>
</body>
</html>
