@extends('layouts.app')

@include('partials.search-form')

@section('content')
    @foreach($users as $user)
        <section>
            <h2>
                {{$user->name}} {{$user->surname}}
            </h2>
            <div>
                <div>
                    <span class="{{asset('svg/book.svg')}}"></span>
                    <p>Numero de livre commandé</p>
                    {{}}
                </div>
                <div>
                    <span class="{{asset('svg/group.svg')}}"></span>
                    <p>{{$user->group}}</p>
                </div>
                @include('partials.user-avatar')
            </div>
        </section>
    @endforeach
@endsection
@include('partials.letters-links')
