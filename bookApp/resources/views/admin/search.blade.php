@extends('layouts.app')

@section('content')
    <div class="container">
        @if($query)
        <p>Le resultat pour votre recherche "{{ $query }}" {{count($details) > 1 ? 'sont' : 'est'}}</p>
        @endif
        <h2>Détails sur {{count($details) > 1 ? 'les utilisateurs' : 'l\'utilisateur'}}</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Photo de profil</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Groupe</th>
            </tr>
            </thead>
            <tbody>
            @foreach($details as $user)
                <tr>
                    <td>{{$user->defaultPictureUser($user)}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->group}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>
@endsection
