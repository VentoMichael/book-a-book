<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@auth()
            @if(Auth::user()->is_administrator)
                {{'Admin |'}}
            @endif
        @endauth{{ 'Book a book' }}
        {{\Request::route()->getName() === 'users.index' ? ' | Étudiants' : ''}}
        {{\Request::route()->getName() === 'books.index' ? ' | Livres' : ''}}
        {{\Request::route()->getName() === 'purchases.index' ? ' | Achats' : ''}}
    </title>

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
    <a class="navbar-brand" href="{{ url('/admin') }}">
        <img src="{{asset('svg/logo.svg')}}" alt="Book a book application">
    </a>
</h1>
@if (Illuminate\Support\Facades\Auth::check())

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <ul class="container">
                <li class="{{\Request::route()->getName() === 'users.index' ? 'current_page_item' : ''}}">
                    <a href="{{route('users.index')}}">
                        Étudiants
                    </a>
                </li>
                <li class="{{\Request::route()->getName() === 'books.index' ? 'current_page_item' : ''}}">
                    <a href="{{route('books.index')}}">
                        Livres
                    </a>
                </li>
                <li class="{{\Request::route()->getName() === 'purchases.index' ? 'current_page_item' : ''}}">
                    <a href="{{route('purchases.index')}}">
                        Achats
                    </a>
                </li>
            </ul>
        </nav>

        <main class="py-4">
            <form action="/admin/search" method="get">
                @csrf
                <label for="search" class="hidden">Chercher dans l'application :</label>
                <input type="search" id="search" name="search" required placeholder="Livres ou étudiants"
                       aria-label="Search through site content">
                <input type="submit">
            </form>
            @endif


            @yield('content')
        </main>
        @if (Illuminate\Support\Facades\Auth::check())

            <nav>
                <a href="/settings">
                    Paramètres
                </a>
                <a href="{{route('dashboard.index')}}">
                    Home
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="admin/{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        @endif

    </div>

</body>
</html>
