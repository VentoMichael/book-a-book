@extends('layouts.app')

@section('content')
    @if(count($books))
        @php
            $firstLetterBook = '';
        @endphp
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <h2 class="hidden">
            Les livres de l'application
        </h2>
        <a href="#">
            Gérer
        </a>
        <a href="{{route('books.create')}}">
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
                                <img src="{{ asset('storage/'.$book->picture) }}"
                                     alt="Photo de couverture de {{$book->title}}">
                                <a href="{{route('books.edit',['book'=>$book->title])}}">Éditer <span>{{$book->title}}</span></a>
                                <a href="{{route('books.show',['book'=>$book->title])}}">Plus d'informations sur <span>{{$book->title}}</span></a>
                            </div>
                        </section>
                </section>
                @endforeach
            @else
                <p>
                    Aucun livre trouvé
                </p>
            @endif
            @include('partials.letters-links')
@endsection
