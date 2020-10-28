@extends('layouts.app')
@section('content')
    @include('partials.search-form')
    @if($book && $user)
        <div class="container">
            @if($query !== null)
                <p>Le resultat pour votre recherche "{{ $query }}":</p>
            @endif
            <h2>Plus en détails</h2>
            <table class="table table-striped">
                <thead>
                @if($book)
                    <tr>
                        <th>Photo de couverture</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Maison d'édition</th>
                        <th>Isbn</th>
                        <th>Présentation</th>
                        <th>Prix public</th>
                        <th>Prix proposé</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($details as $book)
                    <tr>
                        <td>{{$book->picture}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->publishing_house}}</td>
                        <td>{{$book->isbn}}</td>
                        <td>{{$book->presentation}}</td>
                        <td>{{$book->public_price}}</td>
                        <td>{{$book->proposed_price}}</td>
                        <td>{{$book->stock}}</td>
                    </tr>
                @endforeach
                </tbody>
                @endif
                @if($user)
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
                            <td>@include('partials.user-avatar')</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->group}}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
    @endif
    @endif
@endsection
