@extends('layouts.app')

@section('content')
    <h2>
        Paramètres
    </h2>
    <div class="mt-4">
        @foreach($user as $admin)
            <a class="duration-300 w-full rounded-xl mt-2 p-3 border hover:bg-orange-900 hover:text-white" href="{{route('users.edit',['user'=>$admin->name])}}">Gérer mon compte</a>
        @endforeach
    </div>
    <section class="mt-8">
        <h2>
            Aide
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2">
            <a class="duration-300 w-full rounded-xl p-3 border hover:bg-orange-900 hover:text-white" href="{{route('users.index')}}">Voir tous les étudiants</a>
            <a class="duration-300 w-full rounded-xl p-3 border hover:bg-orange-900 hover:text-white" href="{{route('books.index')}}">Voir tous les livres</a>
            <a class="duration-300 w-full rounded-xl p-3 border hover:bg-orange-900 hover:text-white" href="{{route('purchases.index')}}">Voir les differents achats</a>
            <a class="duration-300 w-full rounded-xl p-3 border hover:bg-orange-900 hover:text-white" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </section>
@endsection
