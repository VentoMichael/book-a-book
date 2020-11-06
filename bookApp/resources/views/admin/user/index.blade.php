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
                    @if(count($student->orders) > 0)
                        @foreach($student->orders as $order)
                            @if(count($order->books))
                                {{count($order->books)}}
                            @endif
                        @endforeach
                        livres ont été commandés au total.
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
                        Voir plus d'informations
                    </a>
                </div>
            </div>
        </section>
    @endforeach
    @include('partials.letters-links')
    @include('partials.secondary-menu-admin')
@endsection
