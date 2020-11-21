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
                    <section class="flex flex-col justify-between border-2 rounded-xl p-4">
                        @endif
                        <section id="{{$firstLetter}}" class="flex flex-col justify-between border-2 rounded-xl p-4">
                            <div>
                                <div class="flex justify-between">
                                    <div
                                        class="flex flex-col rounded-xl mr-2 bg-orange-900 p-4 pt-3 relative justify-around text-center">
                                        <div class="containerBookSvg mb-4 self-center"></div>
                                        @if(count($user->orders) >= 1)
                                            @php
                                                $totalbooks = 0;
                                            @endphp
                                            @foreach($user->orders as $order)
                                                @php
                                                    $totalbooks += $order->books->count()
                                                @endphp
                                            @endforeach
                                            <p class="text-xl text-white font-hairline">{{$totalbooks}}</p>
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
                                <div class="mb-8 mt-10 text-center flex justify-between sm:flex-col">
                                    @if($user->orders)
                                        @foreach($user->orders as $order)
                                            <section class="mb-4">
                                                <h3 class="mt-6 mb-4">
                                                    La commande n°{{$loop->iteration}} :
                                                </h3>
                                                @foreach($order->statuses as $status)
                                                    @include('partials.status')
                                                @endforeach
                                            </section>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <a class="rounded-xl block bg-orange-900 text-white p-3"
                                   href="{{route('users.update',['user' => $user->name])}}">
                                    Plus d'informations <span>sur {{$user->name}}</span>
                                </a>
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
