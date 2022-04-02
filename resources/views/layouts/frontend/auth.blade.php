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

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
        <link href="{{ asset('css/globalStyles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/components.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('css/about.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="nav">
            <div class="container">
                <div class="nav__wrapper">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="./images/logo.svg" alt="eFixShoe Logo">
                    </a>

                    <nav>
                        <div class="nav__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-menu">
                                <line x1="3" y1="12" x2="21" y2="12" />
                                <line x1="3" y1="6" x2="21" y2="6" />
                                <line x1="3" y1="18" x2="21" y2="18" />
                            </svg>
                        </div>

                        <div class="nav__bgOverlay"></div>

                        <ul class="nav__list">

                            <div class="nav__close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </div>

                            <div class="nav__list__wrapper">
                                <li><a class="nav__link" href="{{ route('home') }}">Home</a></li>
                                <li><a class="nav__link" href="#">Services</a></li>
                                <li><a class="nav__link" href="{{ route('about-us') }}">About Us</a></li>
                                <li><a class="nav__link" href="#">FAQs</a></li>

                                @guest
                                    <li><a class="nav__link" href="{{ route('login') }}">Account</a></li>
                                @else
                                    <li>|</li>
                                    <li><span class="nav__link">Hi, {{ ucwords(Auth::user()->first_name) }}!</span></li>
                                    <li>|</li>
                                    <li>
                                        <a class="nav__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest

                                <li><a href="#" class="btn primary-btn">Book A Service</a></li>
                            </div>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        @yield('content')

        @include('frontend.footer')

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
