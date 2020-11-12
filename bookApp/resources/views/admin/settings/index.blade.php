@extends('layouts.app')

@section('content')
    <h2>
        Paramètres
    </h2>
    @foreach($user as $admin)
    <a href="{{route('users.edit',['user'=>$admin->name])}}">Gérer mon compte</a>
    @endforeach
    <section>
        <h2>
            Aide
        </h2>
        <a href="{{route('users.index')}}">Voir tous les étudiants</a>
        <a href="{{route('books.index')}}">Voir tous les livres</a>
        <a href="{{route('purchases.index')}}">Voir les differents achats</a>
    </section>
@endsection
