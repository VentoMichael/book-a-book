@extends('layouts.app')
@include('partials.search-form')
@section('content')
    @if(Auth::user()->is_administrator)
        <div>
            @include('partials.search-form')
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
                            <p>Numéro de livres commandés</p>
                        </div>
                        <div>
                            <span class="{{asset('svg/group.svg')}}"></span>
                            <p>{{$user->group}}</p>
                        </div>
                        @include('partials.user-avatar')
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
        @include('partials.letters-links')
    @endif
@endsection
