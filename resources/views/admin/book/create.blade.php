@extends('layouts.app')

@section('content')
    <a href="{{asset('/books')}}">Retour en arrière</a>
    <h2 class="hidden">
        Create a new book
    </h2>
    <form method="POST" action="/books" enctype="multipart/form-data">
        @csrf
        <div class="field">
            <label for="picture" class="label">Photo de couverture</label>
            <input type="file" name="picture" class="@error('picture')is danger @enderror input" id="picture">
            <p>{{$errors->first('picture')}}</p>
        </div>
        <div class="field">
            <label for="title" class="label">Titre</label>
            <input id="title" name="title" type="text" class="input @error('title')is danger @enderror" value="{{ old('title') }}">
            <p>{{$errors->first('title')}}</p>
        </div>
        <div class="field">
            <label for="author" class="label">Auteur</label>
            <input name="author" type="text" value="{{ old('author') }}" class="input @error('author')is danger @enderror" id="author">
            <p>{{$errors->first('author')}}</p>
        </div>
        <div class="field">
            <label for="publishing_house" class="label">Maison d'édition</label>
            <input name="publishing_house" type="text" value="{{ old('publishing_house') }}" class="input @error('publishing_house')is danger @enderror" id="publishing_house">
            <p>{{$errors->first('publishing_house')}}</p>
        </div>
        <div class="field">
            <label for="isbn" class="label">ISBN</label>
            <input name="isbn" type="number" value="{{ old('isbn') }}" class="input @error('isbn')is danger @enderror" id="isbn">
            <p>{{$errors->first('isbn')}}</p>
        </div>
        <div class="field">
            <label for="presentation" class="label">Presentation</label>
            <textarea name="presentation" class="textarea" id="presentation">{{ old('presentation') }}</textarea>
            <p>{{$errors->first('presentation')}}</p>
        </div>
        <div class="field">
            <label for="public_price" class="label">Prix public</label>
            <input name="public_price" value="{{ old('public_price') }}" class="input @error('public_price')is danger @enderror" id="public_price" type="number">
            <p>{{$errors->first('public_price')}}</p>
        </div>
        <div class="field">
            <label for="proposed_price" class="label">Prix proposé</label>
            <input name="proposed_price" class="input @error('proposed_price')is danger @enderror" value="{{ old('proposed_price') }}" id="proposed_price" type="number">
            <p>{{$errors->first('proposed_price')}}</p>
        </div>
        <div class="field">
            <label for="stock" class="label">Stock</label>
            <input name="stock" class="input @error('stock')is danger @enderror" value="{{ old('stock') }}" id="stock" type="number">
            <p>{{$errors->first('stock')}}</p>
        </div>
        <div class="field">
            <button type="submit">Créer un nouveau livre</button>
        </div>
    </form>
@endsection
