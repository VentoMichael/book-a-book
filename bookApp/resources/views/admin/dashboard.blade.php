@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_administrator)
        <div>
            <form action="#">
                <label for="search" class="search">Chercher dans l'application :</label>
                <input type="search" id="search" name="search"
                       aria-label="Search through site content">
                <input type="submit">
            </form>
        </div>
        <nav>
            <h2 class="hidden">
                Principal navigation
            </h2>
        </nav>
        @if(isset($users))
            @foreach($users as $user)
                <section>
                    <h2>
                        {{$user->name}}
                        {{$user->surname}}
                    </h2>
                    <div>
                        <div>
                            <span class="{{asset('svg/book.svg')}}"></span>
                            <p>Numéro de livre commandé</p>
                        </div>
                        <div>
                            <span class="{{asset('svg/group.svg')}}"></span>
                            <p>{{$user->group}}</p>
                        </div>
                        <div>
                            <img src="{{$user->file_name}}" alt="Photo de profil de {{$user->name}}
                            {{$user->surname}}">
                        </div>
                        <div>
                            <p>
                                L'étudiant est en ordre
                            </p>
                        </div>
                        <div>
                            <a href="/users/{{$user->name}}">
                                Voir plus d'informations
                            </a>
                        </div>
                    </div>
                </section>
            @endforeach
        @endif
        <div>
            @foreach(range('A','Z') as $i)
                <a href="#{{$i++}}">{{$i++}}</a>
            @endforeach
        </div>
    @endif

@endsection
