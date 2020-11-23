@extends('layouts.app')

@section('content')
    @if(count($books))
        <h2 class="hidden">
            Réservations
        </h2>
        <ul class="flex justify-around flex-col sm:flex-row">
            <li>
                <a href="#bloc1"
                   class="rounded-xl block my-2 border-2 bg-orange-900 text-white text-center sm:mx-4 p-3 sm:px-12 md:px-16">
                    Bloc 1
                </a>
            </li>
            @for($i = 2; $i <=3;$i++)
                <li>
                    <a href="#bloc{{$i}}"
                       class="rounded-xl block my-2 border-2 hover:text-white hover:bg-orange-900 text-center sm:mx-4 p-3 sm:px-12 md:px-16">
                        Bloc {{$i}}
                    </a>
                </li>
            @endfor
        </ul>
        <div>
            <section>
                <h2 class="rounded-xl my-2 block p-3 sm:px-12 md:px-16 mt-8 mb-2 mx-auto sm:w-2/4 w-full text-center text-md border-orange-900 border-b-2 border-t-2">
                    2D</h2>
                <div class="flex flex-col justify-around gap-8 sm:flex-row">
                    <section class="mb-12 mt-4">
                        <h3 class="text-xl mb-2 hidden">
                            Title 1
                        </h3>
                        <div class="mb-8">
                            <div class="flex flex-col">
                                <img class="self-center max-w-xs" src="{{asset('storage/books/default.public')}}" alt="">
                                <div class="sm:ml-2 mt-4">
                                    <p class="text-xl">titlefezf</p>
                                    <p class="text-md">3242 commandes</p>
                                </div>
                            </div>
                            <button
                                class="md:w-64 sm:self-center hover:bg-orange-900 hover:text-white linkAction rounded-xl w-full duration-300 border-2 px-4 mt-4 py-4">
                                Envoyer une notification de disponibilité
                            </button>
                        </div>
                    </section>
                    <section>
                        <div class="flex flex-col justify-around gap-8">
                            <section class="mb-12 mt-4">
                                <h3 class="text-xl mb-2 hidden">
                                    Title 2
                                </h3>
                                <div class="mb-8">
                                    <div class="flex flex-col">
                                        <img class="self-center max-w-xs" src="{{asset('storage/books/default.public')}}"
                                             alt="">
                                        <div class="sm:ml-2 mt-4">
                                            <p class="text-xl">titlefezf</p>
                                            <p class="text-md">3242 commandes</p>
                                        </div>
                                    </div>
                                    <button
                                        class="md:w-64 sm:self-center hover:bg-orange-900 hover:text-white linkAction rounded-xl w-full duration-300 border-2 px-4 mt-4 py-4">
                                        Envoyer une notification de disponibilité
                                    </button>
                                </div>
                            </section>
                        </div>
                    </section>
                </div>
                <section id="bloc1" class="mt-6">
                    @foreach($books as $book)
                        {{$book}}
                    @endforeach
                </section>
                @else
                    <p>
                        Aucun achat trouvé vus qu'il n'y a pas d'étudiant
                    </p>
            </section>
        </div>
    @endif
@endsection
