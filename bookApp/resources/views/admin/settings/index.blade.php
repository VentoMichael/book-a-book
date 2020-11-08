@extends('layouts.app')

@section('content')
    <h2>
        Paramètres
    </h2>
    <a href="{{asset('/users/Vento/edit')}}">Gérer mon compte</a>
    <section>
        <h2>
            Aide
        </h2>
        <a href="{{asset('/')}}users">Voir tous les étudiants</a>
        <a href="{{asset('/')}}books">Voir tous les livres</a>
        <a href="{{asset('/')}}books#">Éditer un livre</a>
        <a href="{{asset('/')}}purchases">Voir les differents achats</a>
    </section>
@endsection
