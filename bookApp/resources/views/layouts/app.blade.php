<!doctype html>
<html lang="fr" class="bg-orange-900">
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
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
@if(!auth())
    <body onload="hideMessage()" class="bg-white m-3 mb-0 rounded-xl">

    <div class="flex flex-col sm:max-w-3xl md:m-auto pb-6 justify-between md:w-3/4">
        @endif
        <body onload="hideMessage()" class="bg-white m-3 mb-0 rounded-xl mb-24">

        <div>
            <div class="inline-block">
                <h1 class="ml-3 mt-3 inline-block">
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        <img class="logo" src="{{asset('svg/logo.svg')}}" alt="Book a book application">
                    </a>
                </h1>
            </div>
            <div class="flex flex-col md:flex-row justify-between">
                @if (Illuminate\Support\Facades\Auth::check())
                    <div id="app" class="flex items-center m-auto">
                        <nav class="m-auto mt-4 mb-4 navbar navbar-expand-md navbar-light">
                            <ul class="container flex items-center">
                                <li class="m-3 my-0 duration-300 opacity-25 hover:opacity-100 {{ Request::is('*/users/*') || Request::is('*/users') || Request::is('*/dashboard/*') ? "current_page_item" : "" }}">
                                    <a class="text-xl" href="{{route('users.index')}}">
                                        Étudiants
                                    </a>
                                </li>
                                <li class="m-3 my-0 duration-300 opacity-25 hover:opacity-100 {{ Request::is('*/books/*') || Request::is('*/books') ? "current_page_item" : "" }}">
                                    <a class="text-xl" href="{{route('books.index')}}">
                                        Livres
                                    </a>
                                </li>
                                <li class="m-3 my-0 duration-300 opacity-25 hover:opacity-100 {{ Request::is('*/purchases/*') || Request::is('*/purchases') ? "current_page_item" : "" }}">
                                    <a class="text-xl" href="{{route('purchases.index')}}">
                                        Achats
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <form action="/admin/search" class="z-0 absolute top-0 right-0 mt-6 mr-6" method="get">
                            @csrf
                            <label for="formSearch" class="hidden">Chercher dans l'application :</label>
                            <input type="search" id="formSearch" onclick="stayOpenFunction()"
                                   class="searchInput rounded-xl border-2 border-orange-900 w-12 h-12 p-1 bg-transparent"
                                   name="search" required
                                   placeholder="Livres ou étudiants"
                                   aria-label="Search through site content">
                            <input class="hidden" type="submit">
                            <div class="submitDiv absolute top-0 right-0">
                            </div>
                        </form>
                    </div>
            </div>
            <main class="py-4 mr-26 bg-white my-0 mx-3">
                @endif
                @yield('content')
            </main>
            @if(Illuminate\Support\Facades\Auth::check())
                <nav>
                    <ul class="flex justify-around relative navSecondary mb-4">
                        <li>
                            <a class="text-transparent homeSvg" href="{{route('dashboard.index')}}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a class="text-transparent settingsSvg" href="{{route(('settings.index'))}}">
                                Paramètres
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
        </body>
        @if(!auth())
    </div>
    </body>
@endif
</html>
