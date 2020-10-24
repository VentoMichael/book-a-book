@extends('layouts.app')

@section('content')
    <h2>
        Les livres de l'application
    </h2>
    @foreach($books as $book)
        <div>
            <img src="" alt="">{{$book->picture}}
            <p>{{$book->title}}</p>
            <a href="">Plus d'informations</a>
        </div>
    @endforeach
@endsection
