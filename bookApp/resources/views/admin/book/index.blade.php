@extends('layouts.app')

@section('content')
    @include('partials.search-form')
    <h2>
        Les livres de l'application
    </h2>
    @foreach($books as $book)
        <div>
            <img src="img/picture/books/{{ $book->picture }}" alt="{{$book->title}}">
            <p>{{$book->title}}</p>
            <a href="{{$book->path()}}">Plus d'informations</a>
        </div>
    @endforeach
    @include('partials.letters-links')
@endsection
