@extends('layouts.app')

@section('content')
    <section>
        <h2>
            {{$student->name}}
            {{$student->surname}}
        </h2>
        <div>
            <div>
                <span class="{{asset('svg/book.svg')}}"></span>
                @if(count($student->orders))
                    {{count($student->orders)}} commandes ont été réalisées au total
                @else
                    <p>Aucune commande n'a encore été réalisée jusqu'à présent</p>
                @endif
            </div>
            <div>
                <span class="{{asset('svg/group.svg')}}"></span>
                <p>{{$student->group}}</p>
            </div>
            @include('partials.user-avatar')
            <div>
                {{$student->name}}
                {{$student->surname}}
            </div>
        </div>
    </section>
    @if(count($student->orders))
        <section>
            <h2>
                Voici un historique de vos 5 dernières commandes
            </h2>
            <section>
                @if($student->orders)
                    @foreach($student->orders as $order)
                        <section>
                            <h3>
                                La commande n°{{$loop->iteration}} contient les livres suivants :
                            </h3>
                            @foreach($order->books as $book)
                                <img src="{{ asset('storage/'.$book->picture) }}"
                                     alt="Photo de couverture de {{$book->title}}">
                                <p>{{$book->title}}</p>
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
                    @endforeach
                @endif
            <a href="#">Noté comme étudiant en ordre</a>
            <a href="#">Envoyé une notification de rappel général</a>
        </section>
    @endif
@endsection
