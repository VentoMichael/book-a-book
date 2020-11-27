@extends('layouts.app')

@section('content')
    <a href="{{asset('/books')}}">Retour en arrière</a>
    <section>
        <h2 class="hidden">
            Informations de {{$book->title}}
        </h2>
        <ul>
            <li>
                <img src="{{ asset('storage/'.$book->picture) }}" alt="Photo de couverture de {{$book->title}}">
            </li>
            <li>
                Titre : {{$book->title}}
            </li>
            <li>
                Auteur(s) : {{$book->author}}
            </li>
            <li>
                Maison d'édition : {{$book->publishing_house}}
            </li>
            <li>
                ISBN : {{$book->isbn}}
            </li>
            <li>
                Prix public : {{$book->public_price}}
            </li>
            <li>
                Prix proposé : {{$book->proposed_price}}
            </li>
            <li>
                Stock : {{$book->stock}}
            </li>
        </ul>
    </section>
<<<<<<< 4f95b62a3e11769b3815c3c24aa6c4661f507165
    <a href="{{$book->path()}}/edit">Modifier ce livre</a>
    <form method='POST' action="{{ route('book.destroy',$book) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer le livre"
=======
    <a href="{{$book->path()}}/edit">Modifier <span>{{$book->title}}</span></a>
    <form method='POST' action="{{ route('book.destroy',$book) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer {{$book->title}}"
>>>>>>> add update data of admin
               onclick="return confirm('Cette action ne peut pas être annulée. Cela supprimera définitivement le livre et les commandes liés. Étes-vous sûr de supprimer le livre suivant : {{$book->title}}')"/>
    </form>
@endsection
