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
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layouts.styles')
    <!-- Scripts -->
</head>
<body class="font-sans antialiased">
<div class="" id="app">
    @include('navigation-dropdown')

    <!-- Page Content -->
    <main class="">
        <div class="main-wrapper">
            <br><br><br>
            {{ $slot }}
        </div>
    </main>
        <livewire:messages.messages-nav-bar/>

        <div class="bg-red-500 scroll-top">
            <i class="bi bi-finger-index"></i>
        </div>
</div>
@stack('modals')
@livewireScripts
{{--@include('layouts.scripts')--}}

{{--<script src="js/app.js"></script>--}}
{{--@if(config('app.env') == 'local')--}}
{{--    <script src="http://localhost:35729/livereload.js"></script>--}}
{{--    <script src="http://127.0.0.1:35729/livereload.js"></script>--}}
{{--@endif--}}
</body>
</html>
