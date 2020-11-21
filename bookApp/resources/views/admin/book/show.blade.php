@extends('layouts.app')

@section('content')
    <div class="relative">
        @if($booksDraft)
            <a class="backLink text-transparent text-xl relative text-2xl" title="Retour en arrière"
               href="{{route('books.draft')}}">Retour
                en arrière</a>
        @else
            <a class="backLink text-transparent text-xl relative text-2xl" title="Retour en arrière"
               href="{{route('books.index')}}">Retour
                en arrière</a>
        @endif

        @if (Session::has('message'))
            <div id="sucessMessage"
                 class="fixed top-0 bg-green-500 w-full p-4 right-0 text-center text-white">{{ Session::get('message') }}</div>
        @endif
            @include('partials.cta-menu')
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
            @if($booksDraft)
                <form method="POST" action="/admin/books/{{$book->title}}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <button name="publish" class="duration-300 p-3 inline hover:bg-orange-900 hover:text-white w-full rounded-xl sm:mt-6 border-2 border-orange-900 block mt-8 p-3">
                        Publié {{$book->title}}
                    </button>
                </form>
            @else
                <form method="POST" action="/admin/books/{{$book->title}}/edit"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <button class="duration-300 p-3 inline bg-orange-900 w-full rounded-xl sm:mt-6 border-2 border-orange-900 block mt-8 p-3">
                        Éditer {{$book->title}}
                    </button>
                </form>
            @endif
                <form method='POST' action="{{ route('books.destroy',$book) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" onclick="return confirm('Cette action ne peut pas être annulée. Cela supprimera définitivement le livre et les commandes liés. Étes-vous sûr de supprimer le livre suivant : {{$book->title}}')" class="duration-300 p-3 inline bg-orange-900 w-full rounded-xl sm:mt-6 border-2 text-white border-orange-900 block mt-8 p-3" value="Supprimer {{$book->title}}"/>
                </form>
        </div>
    </div>
@endsection
