@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_administrator)
        <section>
            <h2>
                {{$book->title}}
            </h2>
            <img src="{{ asset('storage/'.$book->picture) }}" alt="Photo de couverture de {{$book->title}}">
        </section>
        <a href="{{$book->path()}}/edit">Éditer ce livre</a>
    @endif
@endsection
