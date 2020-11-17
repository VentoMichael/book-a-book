@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 ml-4 flex-wrap justify-between gap-12 mr-4 sm:mr-8">
        @if(count($users))
            @foreach($users as $user)
                @php
                    $firstLetter = '';
                @endphp
                @if(strtoupper(substr($user->name,0,1)) !== $firstLetter)
                    @php
                        $firstLetter = strtoupper(substr($user->name,0,1));
                    @endphp
                @else
                    <section class="border-2 rounded-xl p-4">
                        @endif
                        <section id="{{$firstLetter}}" class="border-2 rounded-xl p-4">
                            <div>
                                <div class="flex justify-between">
                                    <div
                                        class="flex flex-col rounded-xl mr-2 bg-orange-900 p-4 pt-3 relative justify-around text-center">
                                        <div class="containerBookSvg mb-4 self-center"></div>
                                        @if(count($user->orders) >= 1)
                                            @foreach($user->orders as $order)
                                                @if(count($order->books))
                                                    @foreach($order->books as $book)
                                                        <p class="text-xl text-white font-hairline">{{$book->pivot->count()}}</p>
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
                                    @include('partials.user-avatar')
                                </div>
                                <h2 class="text-xl mt-4 break-all">
                                    {{$user->name}} {{$user->surname}}
                                </h2>
                                <div class="mb-8 mt-10 text-center">
                                    <p class="rounded border-t border-b p-3 inline">
                                        L'étudiant est en ordre
                                    </p>
                                </div>
                                <div class="text-center">
                                    <a class="rounded-xl block bg-orange-900 text-white p-3"
                                       href="{{route('users.update',['user' => $user->name])}}">
                                        Plus d'informations <span>sur {{$user->name}}</span>
                                    </a>
                                </div>
                            </div>
                        </section>
                        @endforeach
                        @else
                            <p>
                                Encore aucun étudiants
                            </p>
                    </section>
                @endif
    </div>
    @include('partials.letters-links')
@endsection
