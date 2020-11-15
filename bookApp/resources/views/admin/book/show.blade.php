@extends('layouts.app')

@section('content')
    <div class="relative">
        <a class="backLink text-transparent text-xl absolute" title="Retour en arrière" href="{{route('books.index')}}">Retour
            en arrière</a>
        <section>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <h2 class="hidden">
                Informations de {{$book->title}}
            </h2>
            <ul class="sm:gap-12 sm:grid sm:grid-cols-2">
                <li class="flex justify-center">
                    <img src="{{ asset('storage/'.$book->picture) }}" alt="Photo de couverture de {{$book->title}}">
                </li>
                <li class="my-2 text-xl">
                    Titre : {{$book->title}}
                </li>
                <li class="my-2 text-xl">
                    Auteur(s) : {{$book->author}}
                </li>
                <li class="my-2 text-xl">
                    Orientation : {{$book->orientation}}
                </li>
                <li class="my-2 text-xl">
                    Maison d'édition : {{$book->publishing_house}}
                </li>
                <li class="my-2 text-xl">
                    ISBN : {{$book->isbn}}
                </li>
                <li class="my-2 text-xl">
                    Prix public : {{$book->public_price}}
                </li>
                <li class="my-2 text-xl">
                    Prix proposé : {{$book->proposed_price}}
                </li>
                <li class="my-2 text-xl">
                    Stock : {{$book->stock}}
                </li>
            </ul>
        </section>
        <div class="sm:gap-12 grid sm:grid-cols-2">
            <a class="rounded-xl mt-6 p-3 border hover:bg-orange-900 hover:text-white text-center"
               href="{{ route('books.edit',$book) }}">Modifier <span>{{$book->title}}</span></a>
            <form method='POST' action="{{ route('books.destroy',$book) }}">
                @csrf
                @method('DELETE')
                <input type="submit" class="rounded-xl mt-6 bg-orange-900 text-white p-3 w-full"
                       value="Supprimer {{$book->title}}"
                       onclick="return confirm('Cette action ne peut pas être annulée. Cela supprimera définitivement le livre et les commandes liés. Étes-vous sûr de supprimer le livre suivant : {{$book->title}}')"/>
            </form>
        </div>
    </div>
@endsection
