@extends('layouts.app')
@section('content')
    @include('partials.search-form')
    <div class="container">
        @if($query !== null)
            <p>Le resultat pour votre recherche "{{ $query }}" {{count($details) > 1 ? 'sont' : 'est'}}</p>
        @endif
        <h2>Détails sur {{count($details) > 1 ? 'les livres' : 'le livre'}}</h2>
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
        </table>
    </div>
@endsection
