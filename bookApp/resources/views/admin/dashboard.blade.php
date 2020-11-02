@extends('layouts.app')
@section('content')
    @if(Auth::user()->is_administrator)
        <div>
            @include('partials.search-form')
        </div>
        <nav>
            <h2 class="hidden">
                Principal navigation
            </h2>
        </nav>
        @if(count($students))
            @php
                $firstLetter = '';
            @endphp
            @foreach($students as $student)
                @if(strtoupper(substr($student->name,0,1)) !== $firstLetter)
                    @php
                        $firstLetter = strtoupper(substr($student->name,0,1));
                    @endphp
                    <section id="{{$firstLetter}}">
                        @else
                            <section>
                                @endif
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
                @endif
                @include('partials.letters-links')
                @endif
@endsection
