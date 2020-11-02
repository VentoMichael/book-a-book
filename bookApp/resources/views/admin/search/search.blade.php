@extends('layouts.app')
@section('content')
    @include('partials.search-form')
    @if($query !== null)
        @if(count($user))
            <div class="container">
                <p>Le resultat pour votre recherche "{{ $query }}" {{count($user) > 1 ? 'sont' : 'est'}}</p>
                <h2>Détails sur {{count($user) > 1 ? 'les utilisateurs' : 'l\'utilisateur'}}</h2>
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
                    @foreach($user as $student)
                        <tr>
                            <td>@include('partials.user-avatar')</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->surname}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->group}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if(count($book))
            <div class="container">
                <h2>Détails sur {{count($book) > 1 ? 'les livres' : 'le livre'}}</h2>
                <table class="table table-striped">
                    <thead>
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
                    @foreach($book as $bookDetails)
                        <tr>
                            <td><img src="{{asset('img/picture/books/'.$bookDetails->picture)}}" alt="Photo de couverture de {{$bookDetails->title}}"></td>
                            <td>{{$bookDetails->title}}</td>
                            <td>{{$bookDetails->author}}</td>
                            <td>{{$bookDetails->publishing_house}}</td>
                            <td>{{$bookDetails->isbn}}</td>
                            <td>{{$bookDetails->presentation}}</td>
                            <td>{{$bookDetails->public_price}}</td>
                            <td>{{$bookDetails->proposed_price}}</td>
                            <td>{{$bookDetails->stock}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif
@endsection
