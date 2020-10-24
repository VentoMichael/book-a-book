@extends('layouts.app')

@section('content')
    <h2>
        Les livres de l'application
    </h2>
    @foreach($books as $book)
        <div>
            <img src="{{asset($book->picture)}}" alt="{{$book->title}}">
            <p>{{$book->title}}</p>
            <a href="{{$book->path()}}">Plus d'informations</a>
        </div>
    @endforeach
@endsection
