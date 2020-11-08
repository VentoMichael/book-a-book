@extends('layouts.app')
@section('content')
    @if(count($students))
        @foreach($students as $student)
            <section>
                <h2>
                    {{$student->name}} {{$student->surname}}
                </h2>
                <div>
                    <div>
                        <span class="{{asset('svg/book.svg')}}"></span>
                        @if(count($student->orders) >= 1)
                            @foreach($student->orders as $order)
                                @if(count($order->books))
                                    {{count($order->books)}}
                                    @if(count($order->books) > 1)livres ont été commandés
                                    @else livre a été commandé
                                    @endif
                                @endif
                            @endforeach
                            au total.
                        @else
                            <p>Aucun livre n'a encore été commandé jusqu'à présent.</p>
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
                            Plus d'informations <span>sur {{$student->name}}</span>
                        </a>
                    </div>
                </div>
            </section>
        @endforeach
    @else
        <p>
            Encore aucun étudiants
        </p>
    @endif
    @include('partials.letters-links')
@endsection
