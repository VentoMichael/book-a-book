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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div>
    <div class="flex flex-col sm:flex-row justify-around">
        <h1>
            <a class="navbar-brand" href="{{ url('/admin') }}">
                <img src="{{asset('svg/logo.svg')}}" alt="Book a book application">
            </a>
        </h1>
        @if (Illuminate\Support\Facades\Auth::check())
            <div id="app" class="flex items-center">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <ul class="container flex items-center">
                        <li class="m-3 my-0 opacity-25 hover:opacity-100 {{\Request::route()->getName() === 'users.index' ? 'current_page_item' : ''}}">
                            <a href="{{route('users.index')}}">
                                Étudiants
                            </a>
                        </li>
                        <li class="m-3 my-0 opacity-25 hover:opacity-100 {{\Request::route()->getName() === 'books.index' ? 'current_page_item' : ''}}">
                            <a href="{{route('books.index')}}">
                                Livres
                            </a>
                        </li>
                        <li class="m-3 my-0 opacity-25 hover:opacity-100 {{\Request::route()->getName() === 'purchases.index' ? 'current_page_item' : ''}}">
                            <a href="{{route('purchases.index')}}">
                                Achats
                            </a>
                        </li>
                    </ul>
                </nav>
                <form action="/admin/search" class="ml-16 relative" method="get">
                    @csrf
                    <label for="search" class="hidden">Chercher dans l'application :</label>
                    <input type="search" class="p-3 pl-12 rounded-xl border-2 focus:border-orange-500 border-orange-900" id="search" name="search" required
                           placeholder="Livres ou étudiants"
                           aria-label="Search through site content">
                    <input class="hidden" type="submit">
                    <div class="submitDiv">
                    </div>
                </form>
            </div>
    </div>
    <main class="py-4 mr-26">
        @endif
        @yield('content')
    </main>
    @if (Illuminate\Support\Facades\Auth::check())

        <nav>
            <a href="{{route(('settings.index'))}}">
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

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>
    @endif

</div>

</body>
</html>
