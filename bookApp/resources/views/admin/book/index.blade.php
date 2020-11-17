@extends('layouts.app')

@section('content')
    @if(count($books))
        @php
            $firstLetterBook = '';
        @endphp
        @if (Session::has('message'))
            <div id="sucessMessage"
                 class="fixed top-0 bg-green-500 w-full p-4 right-0 text-center text-white">{{ Session::get('message') }}</div>
        @endif
        <h2 class="hidden">
            Les livres de l'application
        </h2>
        <div class="justify-center flex mb-4">
            <a class="linkAction rounded-xl bg-orange-900 text-white mr-8 px-4 pt-4 pb-4" href="#">
                Gérer
            </a>
            <a class="linkAction rounded-xl border-2 hover:bg-orange-900 hover:text-white duration-300 px-4 pt-4 pb-4"
               href="{{route('books.create')}}">
                Ajouter
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 sm:mr-8 lg:grid-cols-3 ml-4 flex-wrap justify-between gap-12 mr-4">
            @if(count($books))
                @foreach($books as $book)
                    @php
                        $firstLetterBook = '';
                    @endphp
                    @if(strtoupper(substr($book->title,0,1)) !== $firstLetterBook)
                        @php
                            $firstLetterBook = strtoupper(substr($book->title,0,1));
                        @endphp
                    @else
                        <section class="flex flex-col justify-between border-2 rounded-xl p-4">
                            @endif
                            <section id="{{$firstLetterBook}}" class="flex flex-col justify-between border-2 rounded-xl p-4">

                                <div class="flex justify-between">
                                    <img src="{{ asset('storage/'.$book->picture) }}"
                                         alt="Photo de couverture de {{$book->title}}">
                                    <h3 class="text-2xl break-all ml-4">
                                        {{$book->title}}
                                    </h3>
                                </div>
                                <div class="mb-4 mt-10 text-center">
                                    <a class="rounded-xl border p-3 inline hover:bg-orange-900 hover:text-white"
                                       href="{{route('books.edit',['book'=>$book->title])}}">Éditer
                                        <span>{{$book->title}}</span></a>
                                    <a class="rounded-xl block mt-8 bg-orange-900 text-white p-3"
                                       href="{{route('books.show',['book'=>$book->title])}}">Plus d'informations sur
                                        <span>{{$book->title}}</span></a>
                                </div>
                            </section>
                        </section>
                        @endforeach
                        @else
                            <p>
                                Aucun livre trouvé
                            </p>
                        @endif
                    @endif
        </div>
        @include('partials.letters-links')
@endsection
