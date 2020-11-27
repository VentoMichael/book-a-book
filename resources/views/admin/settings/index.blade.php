@extends('layouts.app')

@section('content')
    <h2>
        Paramètres
    </h2>
<<<<<<< 4f95b62a3e11769b3815c3c24aa6c4661f507165
    <a href="#">Gérer mon compte</a>
=======
    <a href="{{asset('/users/Vento/edit')}}">Gérer mon compte</a>
>>>>>>> add update data of admin
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
