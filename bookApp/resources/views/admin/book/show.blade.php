@extends('layouts.app')

@section('content')
    <div class="relative">
        <a class="backLink text-transparent text-xl absolute" title="Retour en arrière" href="{{route('books.index')}}">Retour
            en arrière</a>
        @if (Session::has('message'))
            <div id="sucessMessage"
                 class="fixed top-0 bg-green-500 w-full p-4 right-0 text-center text-white">{{ Session::get('message') }}</div>
        @endif
        <div class="justify-center flex mb-4 flex-col sm:flex-row sm:mr-8">
            <a class="md:w-64 sm:self-center linkAction rounded-xl bg-orange-900 sm:mt-0 w-full text-white px-4 mt-4 py-4"
               href="#">
                Gérer
            </a>
            <a class="sm:self-center linkAction rounded-xl border-2 my-4 sm:my-0 w-full hover:bg-orange-900 md:w-64 sm:mx-8 hover:text-white duration-300 px-4 pt-4 pb-4"
               href="{{route('books.create')}}">
                Ajouter
            </a>
            @if($booksDraft)
                <a class="md:w-64 sm:self-center linkAction rounded-xl border-2 w-full hover:bg-orange-900 hover:text-white duration-300 px-4 pt-4 pb-4"
                   href="{{route('books.draft')}}">
                    Voir mes sauvegardes de livres
                </a>
            @endif
        </div>
        <section>
            <h2 class="hidden">
                Informations de {{$book->title}}
            </h2>
            <ul class="sm:gap-12 sm:grid sm:grid-cols-2">
                <li class="flex justify-center">
                    <img src="{{ asset('storage/'.$book->picture) }}" alt="Photo de couverture de {{$book->title}}">
                </li>
                <li class="my-2 text-xl">
                    Titre : <span class="border p-3 rounded-md">{{$book->title}}</span>
                </li>
                <li class="my-2 text-xl">
                    Auteur(s) : <span class="border p-3 rounded-md">{{$book->author}}</span>
                </li>
                <li class="my-2 text-xl">
                    Orientation : <span class="border p-3 rounded-md">{{$book->orientation}}</span>
                </li>
                <li class="my-2 text-xl">
                    Maison d'édition : <span class="border p-3 rounded-md">{{$book->publishing_house}}</span>
                </li>
                <li class="my-2 text-xl">
                    ISBN : <span class="border p-3 rounded-md">{{$book->isbn}}</span>
                </li>
                <li class="my-2 text-xl">
                    Prix public : <span class="border p-3 rounded-md">{{$book->public_price}} €</span>
                </li>
                <li class="my-2 text-xl">
                    Prix proposé : <span class="border p-3 rounded-md">{{$book->proposed_price}} €</span>
                </li>
                <li class="my-2 text-xl">
                    Stock : <span class="border p-3 rounded-md">{{$book->stock}}</span>
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
