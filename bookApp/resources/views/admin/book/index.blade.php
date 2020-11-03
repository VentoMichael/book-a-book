@extends('layouts.app')

@section('content')
    @include('partials.search-form')
    @if(count($books))
        @php
            $firstLetterBook = '';
        @endphp
        <h2 class="hidden">
            Les livres de l'application
        </h2>
        <a href="#">
            Gérer
        </a>
        <a href="{{}}">
            Ajouter
        </a>
        @foreach($books as $book)
            @if(strtoupper(substr($book->name,0,1)) !== $firstLetterBook)
                @php
                    $firstLetterBook = strtoupper(substr($book->name,0,1));
                @endphp
                <section id="{{$firstLetterBook}}">
                    @else
                        <section>
                            @endif
                            <h3>
                                {{$book->title}}
                            </h3>
                            <div>
                                <img src="img/picture/books/{{ $book->picture }}" alt="{{$book->title}}">
                                <a href="{{$book->path()}}/edit">Plus d'informations</a>
                            </div>
                        </section>
                @endforeach
            @endif
            @include('partials.letters-links')
@endsection
