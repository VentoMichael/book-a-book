@extends('layouts.app')

@section('content')
    @if(count($students))
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
                <h2 class="rounded-xl my-2 block p-3 sm:px-12 md:px-16 mt-4 mb-2 mx-auto sm:w-2/4 w-full text-center text-md border-orange-900 border-b-2 border-t-2">
                    2D</h2>
                <div class="flex justify-around gap-8">
                <section class="mb-16">
                    <h3 class="text-xl mb-2 hidden">
                        Title 1
                    </h3>
                    <div class="mb-8">
                        <div class="flex">
                            <img src="{{asset('storage/books/default.svg')}}" alt="">
                            <div class="ml-2">
                                <p class="text-md">titlefezf</p>
                                <p class="text-md">Commandes</p>
                            </div>
                        </div>
                        <button
                            class="md:w-64 sm:self-center hover:bg-orange-900 hover:text-white linkAction rounded-xl w-full duration-300 border-2 px-4 mt-4 py-4">
                            Envoyer une notification de disponibilité
                        </button>
                    </div>
                </section>
                <section class="mb-16">
                    <h3 class="text-xl mb-2 hidden">
                        Title 2
                    </h3>
                    <div class="mb-8">
                        <div class="flex">
                            <img src="{{asset('storage/books/default.svg')}}" alt="">
                            <div class="ml-2">
                                <p class="text-md">titlefezf</p>
                                <p class="text-md">Commandes</p>
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
            @foreach($students as $student)
                @foreach($student->orders as $order)
                    @foreach($order->books as $book)
                        @if($book['id'] === $book->pivot['book_id'])

                            @switch($book['orientation'])
                                @case('Web')
                                @if($book['orientation'] === 'Web')
                                    <li>
                                        web
                                    </li>
                                    <ul>
                                        <li>
                                            Bloc 1 - web
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
                                                    {{$book->title}}
                                                </li>
                                                <li>
                                                    {{count($order->books)}}
                                                </li>
                                                <li>
                                                    <a href="#">Envoyer une notification de disponibilité</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                @endif
                                @break
                                @case('2D')
                                @if($book['orientation'] === '2D')
                                    <li>
                                        2D
                                    </li>
                                    <ul>
                                        <li>
                                            Bloc 1 - 2D
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
                                                    {{$book->title}}
                                                </li>
                                                @if($book->pivot['book_id'])
                                                    @if($book->pivot->count(['quantity']) > 1)
                                                        <li>
                                                            {{$book->pivot->count(['quantity'])}} livres ont été
                                                            commandés
                                                            au total.
                                                        </li>
                                                    @endif
                                                @endif
                                                <li>
                                                    <a href="#">Envoyer une notification de disponibilité</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                @endif
                                @break
                                @case('3D')
                                @if($book['orientation'] === '3D')
                                    <li>
                                        3D
                                    </li>
                                    <ul>
                                        <li>
                                            Bloc 1 - 3D
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
                                                    {{$book->title}}
                                                </li>
                                                <li>
                                                    Livre 1 COMMANDES TOTAL
                                                </li>
                                                <li>
                                                    <a href="#">Envoyer une notification de disponibilité</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                @endif
                                @break
                            @endswitch
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        </section>
    @else
        <p>
            Aucun achat trouvé vus qu'il n'y a pas d'étudiant
        </p>
    @endif
@endsection
