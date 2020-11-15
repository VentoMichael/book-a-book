@extends('layouts.app')

@section('content')
    <div class="relative">
        <a class="backLink text-transparent text-xl absolute" title="Retour en arrière" href="{{route('users.index')}}">Retour
            en arrière</a>
        <section class="rounded-xl p-4 max-w-5xl m-auto">
            <div>
                <div class="flex justify-between">
                    @include('partials.user-avatar')
                    <div>
                        <div>
                            <h2 class="text-xl break-all ml-4 mr-4">
                                {{$user->name}} {{$user->surname}}
                            </h2>
                        </div>
                        <div class="flex justify-around mt-8">
                            <div class="rounded-xl bg-orange-900 p-3 text-center">
                                <div class="containerBookSvg mb-4 self-center"></div>
                                @if(count($user->orders) >= 1)
                                    @foreach($user->orders as $order)
                                        @if(count($order->books))
                                            @foreach($order->books as $book)
                                                <p class="text-xl text-white font-hairline">{{$book->pivot->count()}}</p>
                                                @if(count($order->books) > 1)
                                                @else
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @else
                                    <p class="text-xl text-white font-hairline">0</p>
                                @endif
                            </div>
                            <div class="rounded-xl bg-orange-900 p-3 pt-3 relative justify-around text-center">
                                <div class="containerGroupSvg mb-2 m-auto"></div>
                                <p class="text-xl text-white font-hairline">{{$user->group}}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center p-4 mt-8 -mb-8">
                    <a class="rounded-xl block bg-orange-900 text-white p-3" href="mailto:{{$user->email}}">Envoyer un
                        mail à {{$user->name}} {{$user->surname}}</a>
                </div>
            </div>
        </section>
        @if(count($user->orders))
            <section class="pl-8 mt-6 max-w-5xl m-auto">
                <h2 class="text-2xl">
                    Voici un historique de vos 5 dernières commandes
                </h2>
                <section>
                    @if($user->orders)
                        @foreach($user->orders as $order)
                            <section>
                                <h3 class="mt-6 mb-4">
                                    La commande n°{{$loop->iteration}} contient les livres suivants :
                                </h3>
                                <section>
                                    @foreach($order->books as $book)
                                        <div class="flex mb-8">
                                            <img src="{{ asset('storage/'.$book->picture) }}"
                                                 alt="Photo de couverture de {{$book->title}}">
                                            <h4 class="ml-4">{{$book->title}}</h4>
                                        </div>
                                    @endforeach
                                    @foreach($order->statuses as $statuses)
                                        @switch($statuses['name'])
                                            @case('paid')
                                            <p>
                                                Payé
                                            </p>
                                            @break

                                            @case('available')
                                            <p>
                                                Disponible au bureau
                                            </p>
                                            @break

                                            @case('delivered')
                                            <p>
                                                Delivré
                                            </p>
                                            @break

                                            @case('ordered')
                                            <p>
                                                En ordre
                                            </p>
                                            @break
                                        @endswitch
                                    @endforeach
                                </section>
                            </section>
                        @endforeach
                    @endif
                    <a href="#">Noté comme étudiant en ordre</a>
                    <a href="#">Envoyé une notification de rappel général</a>
                </section>
            </section>
        @endif
    </div>
@endsection
