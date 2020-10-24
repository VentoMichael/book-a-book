@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_administrator)
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
        </div>
        </section>
        <section>
            <h2>
                La commande contiens les livres suivants :
            </h2>
            @foreach($books as $book)

            <section>
                <img src="{{$book->picture}}" alt="{{$book->name}}">
                <h3>{{$book->title}}</h3>
                <p>Payé ou non</p>
                <p>Date</p>
                <a href="#">Envoyé une notification de reçu</a>
            </section>
                @endforeach
        </section>
        <a href="#">Noté comme étudiant en ordre</a>
    @endif
@endsection
