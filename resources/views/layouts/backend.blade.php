<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="/argon/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link type="text/css" href="/argon/css/argon.css?v=1.0.0" rel="stylesheet">
    <style>
        .bg-primary{
            background-color: #188A57 !important;
        }
    </style>
    
    @stack('css')
</head>
<body class="{{$class ?? ''}}">
    @php
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){ $protocol = "https://".$_SERVER['HTTP_HOST']; } else{ $protocol='http://'.$_SERVER['HTTP_HOST']; }
    @endphp
    <div id="app">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @if (!in_array(request()->route()->getName(), ['welcome']))
                @include('layouts.navbars.sidebar')
            @endif
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
        </div>
        @guest
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Booking Platform') }}
                    </a> --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        
        @endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="/argon/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/argon/vendor/js-cookie/js.cookie.js"></script>
    <script src="/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="/argon/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
    <!-- Optional JS -->
    {{-- <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script> --}}

    @stack('js')

    <!-- Argon JS -->
    <script src="/argon/js/argon.js?v=1.0.0"></script>
    <script src="/argon/js/demo.min.js"></script>

    <script>
        // $('textarea').emojioneArea({
        //     pickerPosition: "bottom"
        // });
    </script>
    
</body>
</html>
