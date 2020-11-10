@extends('layouts.app')

@section('content')
    <a href="{{route('books.index')}}">Retour en arrière</a>
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
                Orientation : {{$book->orientation}}
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
    <a href="{{ route('books.edit',$book) }}">Modifier <span>{{$book->title}}</span></a>
    <form method='POST' action="{{ route('books.destroy',$book) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer {{$book->title}}"
               onclick="return confirm('Cette action ne peut pas être annulée. Cela supprimera définitivement le livre et les commandes liés. Étes-vous sûr de supprimer le livre suivant : {{$book->title}}')"/>
    </form>
@endsection
