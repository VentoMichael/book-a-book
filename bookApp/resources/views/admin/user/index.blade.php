@extends('layouts.app')
@section('content')
    @include('partials.search-form')
    @foreach($students as $student)
        <section>
            <h2>
                {{$student->name}} {{$student->surname}}
            </h2>
            <div>
                <div>
                    <span class="{{asset('svg/book.svg')}}"></span>
                    @if(count($student->orders))
                        {{count($student->orders)}} commandes ont été réalisées dont XXXXXXXXXXXXX livres au total
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
                    <p>
                        L'étudiant est en ordre
                    </p>
                </div>
                <div>
                    <a href="/users/{{$student->name}}">
                        Voir plus d'informations
                    </a>
                </div>
            </div>
        </section>
    @endforeach
    @include('partials.letters-links')

@endsection
