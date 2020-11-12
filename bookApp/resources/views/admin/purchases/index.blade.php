@extends('layouts.app')

@section('content')
    @if(count($students))
        <h2 class="hidden">
            Réservations
        </h2>
        <ul>
            @for($i = 1; $i <=3;$i++)
                <li>
                    <a href="#bloc{{$i}}">
                        Bloc {{$i}}
                    </a>
                </li>
            @endfor
        </ul>
        <section id="bloc1">
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
                                                        {{$book->pivot->count(['quantity'])}} livres ont été commandés
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
