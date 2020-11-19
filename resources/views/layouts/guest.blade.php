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
    <!-- Page Content -->
    <main class="">
        <div class="main-wrapper">


            <div class="timeline-wrapper">
                <div class="timeline-header">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters align-items-center">
                            <div class="col-lg-6">
                                <div class="timeline-logo-area d-flex align-items-center">
                                    <div class="timeline-logo">
                                        <a href="index.blade.php">
                                            <img src="{{asset('assets/images/logo/logo-white.png')}}">
                                        </a>
                                    </div>
                                    <div class="timeline-tagline">
                                        <h6 class="tagline">Connect and share with the people in your life </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="login-area">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-sm">
                                                <input type="text" placeholder="Email or Userame" name="email"
                                                       value="{{old('email')}}" class="single-field">
                                            </div>
                                            <div class="col-12 col-sm">
                                                <input type="password" placeholder="Password" name="password"
                                                       class="single-field">
                                            </div>
                                            <div class="col-12 col-sm-auto">
                                                <button class="login-btn">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="timeline-page-wrapper">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <div class="timeline-bg-content bg-img"
                                     data-bg="assets/images/timeline/adda-timeline.jpg">
                                    <h3 class="timeline-bg-title">Let’s see what’s happening to you and your world.
                                        Welcome
                                        in Adda.</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 d-flex align-items-center justify-content-center">
                                <div class="signup-form-wrapper">
                                    <h1 class="create-acc text-center">Create An Account</h1>
                                    <div class="signup-inner text-center">
                                        <h3 class="title">Wellcome to Adda</h3>
                                        <form class="signup-inner--form">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="email" class="single-field" placeholder="Email">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="single-field" placeholder="First Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="single-field" placeholder="Last Name">
                                                </div>
                                                <div class="col-12">
                                                    <input type="password" class="single-field" placeholder="Password">
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="nice-select" name="sortby">
                                                        <option value="trending">Gender</option>
                                                        <option value="sales">Male</option>
                                                        <option value="sales">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="nice-select" name="sortby">
                                                        <option value="trending">Age</option>
                                                        <option value="sales">18+</option>
                                                        <option value="sales">18-</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <select class="nice-select" name="sortby">
                                                        <option value="trending">Country</option>
                                                        <option value="sales">Bangladesh</option>
                                                        <option value="sales">Noakhali</option>
                                                        <option value="sales">Australia</option>
                                                        <option value="sales">China</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <button class="submit-btn">Create Account</button>
                                                </div>
                                            </div>
                                            <h6 class="terms-condition">I have read & accepted the <a href="#">terms of
                                                    use</a></h6>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@stack('modals')
@livewireScripts

@include('layouts.scripts')
<script src="js/app.js"></script>
</body>
</html>

