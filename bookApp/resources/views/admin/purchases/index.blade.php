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
        @for($i = 1; $i <=3;$i++)
            <section id="bloc{{$i}}">
                @foreach($students as $student)
                    @foreach($student->orders as $order)
                        @foreach($order->books as $book)
                            <h3>
                                {{$book}}
                            </h3>
                            <ul>
                                <li>

                                </li>
                            </ul>
                        @endforeach
                    @endforeach
                @endforeach
            </section>
        @endfor
    @else
        <p>
            Aucun achat trouvé vus qu'il n'y a pas d'étudiant
        </p>
    @endif
@endsection
