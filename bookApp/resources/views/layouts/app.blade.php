<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@auth()
            @if(Auth::user()->is_administrator){{'Admin |'}} @endif
        @endauth{{ 'Book a book' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<h1>
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('svg/logo.svg')}}" alt="Book a book application">
    </a></h1>
<div id="app">
    @auth()
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <ul class="container">
                <!--<li class="\Symfony\Component\HttpFoundation\Request::is ('student') ? "current_link" : """>Étudiants</li>-->
                <a href="">
                    <li>
                        Books
                    </li>
                </a>
            </ul>
        </nav>
    @endauth

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
