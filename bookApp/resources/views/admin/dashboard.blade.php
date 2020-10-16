@extends('layouts.app')

@section('content')
    @auth(Auth::user()->isAdministrator())
        <div>
            <label for="search" class="search">Search the site:</label>
            <input type="search" id="search" name="search"
                   aria-label="Search through site content">
        </div>
        <nav>
            <h2 class="hidden">
                Principal navigation
            </h2>
            <ul>
                <li><a href="#">Étudiants</a></li>
                <li><a href="#">Livres</a></li>
                <li><a href="#">Achats</a></li>
            </ul>
        </nav>
        @if(isset($users))
            @foreach($users as $user)
                <section>
                    <h2>
                        {{$user->name}}
                    </h2>
                    <div>
                        <div>
                            <span class="{{asset('svg/book.svg')}}"></span>
                            <p>Numero de livre commandé</p>
                        </div>
                        <div>
                            <span class="{{asset('svg/group.svg')}}"></span>
                            <p>{{$user->group}}</p>
                        </div>
                        <div>
                            <img src="{{asset('svg/group.svg')}}" alt="Photo d'étudiant 1">
                        </div>
                    </div>
                </section>
            @endforeach
        @endif
        <div>
            @foreach(range('A','Z') as $i)
                <span>{{$i++}}</span>
            @endforeach
        </div>
    @endauth

@endsection
