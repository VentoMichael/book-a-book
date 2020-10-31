@extends('layouts.app')

@section('content')
    @include('partials.search-form')
    @if(count($books))
        @php
            $firstLetterBook = '';
        @endphp
        @foreach($books as $book)
            @if(strtoupper(substr($book->name,0,1)) !== $firstLetterBook)
                @php
                    $firstLetterBook = strtoupper(substr($book->name,0,1));
$firstLetterBook = strtoupper(substr($book->name,0,1));
                @endphp
                <section id="{{$firstLetterBook}}">
                    @else
                        <section>
                            @endif
                            <h2>
                                Les livres de l'application
                            </h2>
                            <div>
                                <img src="img/picture/books/{{ $book->picture }}" alt="{{$book->title}}">
                                <p>{{$book->title}}</p>
                                <a href="{{$book->path()}}">Plus d'informations</a>
                            </div>
                        </section>
                @endforeach
@endif
                @include('partials.letters-links')
@endsection
