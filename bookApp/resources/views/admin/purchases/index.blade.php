@extends('layouts.app')

@section('content')
    @if(count($students))
    <h2 class="hidden">
        Réservations
    </h2>
    <ul>
        <li>
            <a href="#bloc1">
                Bloc 1
            </a>
        </li>
        <li>
            <a href="#bloc2">
                Bloc 2
            </a>
        </li>
        <li>
            <a href="#bloc3">
                Bloc 3
            </a>
        </li>
    </ul>
    @foreach($students as $student)
        <section id="bloc1">
            <h3>
                Bloc 1
            </h3>
            <ul>
                <li></li>
            </ul>
        </section>
        <section id="bloc2">
            <h3>
                Bloc 2
            </h3>
            <ul>
                <li></li>
            </ul>
        </section>
        <section id="bloc3">
            <h3>
                Bloc 3
            </h3>
            <ul>
                <li></li>
            </ul>
        </section>
    @endforeach

    @foreach($student->orders as $order)
            @foreach($order->books as $book)
                @switch($student['group'])
                    @case(2181)
                    @case(2182)
                    @case(2183)
                    @case(2184)
                    @case(2185)
                    @case(2186)
                    Livre de 1 ére année {{$student['group']}}
                    @break
                    @case(2281)
                    @case(2282)
                    @case(2283)
                    @case(2284)
                    @case(2285)
                    @case(2286)
                    Livre de 2 éme année {{$student['group']}}
                    @break
                    @case(2381)
                    @case(2382)
                    @case(2383)
                    @case(2384)
                    @case(2385)
                    @case(2386)
                    Livre de 3 éme année {{$student['group']}}
                    @break
                @endswitch
            @endforeach
    @endforeach
    @else
        <p>
            Aucun achat trouvé vus qu'il n'y a pas d'étudiant
        </p>
    @endif
@endsection
