@extends('layouts.app')

@section('content')
    @if(count($booksDraft))
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
        @include('partials.cta-menu')
        <div
            class="grid mt-12 grid-cols-1 sm:grid-cols-2 sm:mr-8 lg:grid-cols-3 ml-4 flex-wrap justify-between gap-12 mr-4">
            @if(count($booksDraft))
                @foreach($booksDraft as $bookDraft)
                    <section
                        class="flex flex-col justify-between border-2 rounded-xl p-4">

                        <div class="flex justify-between">
                            <img src="{{ asset('storage/'.$bookDraft->picture) }}"
                                 alt="Photo de couverture de {{$bookDraft->title}}">
                            <h3 class="text-2xl break-all ml-4">
                                {{$bookDraft->title}}
                            </h3>
                        </div>
                        <div class="mb-4 mt-10 text-center">
                            <a class="duration-300 rounded-xl border p-3 inline hover:bg-orange-900 hover:text-white"
                               href="{{route('books.edit',['book'=>$bookDraft->title])}}">Éditer
                                <span>{{$bookDraft->title}}</span></a>
                            <a class="rounded-xl block mt-8 bg-orange-900 text-white p-3"
                               href="{{route('books.show',['book'=>$bookDraft->title])}}">Plus d'informations sur
                                <span>{{$bookDraft->title}}</span></a>
                        </div>
                    </section>
                @endforeach
            @else
                <p>
                    Aucune sauvegarde trouvé
                </p>
            @endif
            @endif
        </div>
@endsection
