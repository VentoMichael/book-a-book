@extends('layouts.app')
@include('partials.search-form')
@section('content')
    @foreach($students as $student)
        <section>
            <h2>
                {{$student->name}} {{$student->surname}}
            </h2>
            <div>
                <div>
                    <span class="{{asset('svg/book.svg')}}"></span>
                    @if(count($student->orders))
                        {{count($student->orders)}} livres ont été commandés
                    @else
                        <p>Aucun livres n'a encore été commandé</p>
                    @endif
                </div>
                <div>
                    <span class="{{asset('svg/group.svg')}}"></span>
                    <p>{{$student->group}}</p>
                </div>
                @include('partials.user-avatar')
            </div>
        </section>
    @endforeach

@endsection
@include('partials.letters-links')
