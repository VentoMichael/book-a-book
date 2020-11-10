@extends('layouts.app')
@section('content')
    @if($query !== null)
        @if(count($users))
            <div class="container">
                <p>Le resultat pour votre recherche "{{ $query }}" {{count($users) > 1 ? 'sont' : 'est'}}</p>
                <h2>Détails sur {{count($users) > 1 ? 'les utilisateurs' : 'l\'utilisateur'}}</h2>
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
                    @foreach($users as $user)
                        <tr>
                            <td>@include('partials.user-avatar')</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->group}}</td>
                            <td>
                                <a href="{{route('users.show',['user'=>$user])}}">Voir les informations de {{$user->name}} {{$user->surname}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if(count($books))
            <div class="container">
                <h2>Détails sur {{count($books) > 1 ? 'les livres' : 'le livre'}}</h2>
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
                    @foreach($books as $bookDetails)
                        <tr>
                            <td><img src="{{asset('img/'.$bookDetails->picture)}}" alt="Photo de couverture de {{$bookDetails->title}}"></td>
                            <td>{{$bookDetails->title}}</td>
                            <td>{{$bookDetails->author}}</td>
                            <td>{{$bookDetails->publishing_house}}</td>
                            <td>{{$bookDetails->isbn}}</td>
                            <td>{{$bookDetails->presentation}}</td>
                            <td>{{$bookDetails->public_price}}</td>
                            <td>{{$bookDetails->proposed_price}}</td>
                            <td>{{$bookDetails->stock}}</td>
                            <td>
                            <td>
                                <a href="/books/{{$bookDetails->title}}">Voir les informations
                                    de {{$bookDetails->title}}</a></td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif
@endsection
