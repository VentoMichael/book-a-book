@extends('layouts.app')

@section('content')
    <div class="relative">
        <a class="backLink text-transparent text-xl absolute" title="Retour en arrière" href="{{route('books.index')}}">Retour
            en arrière</a>
        <h2 class="hidden">
            Create a new book
        </h2>
        <div class="justify-center flex mb-4">
            <a class="linkAction rounded-xl border-2 hover:bg-orange-900 hover:text-white duration-300 px-4 pt-4 pb-4"
               href="#">
                Gérer
            </a>
            <a class="linkAction rounded-xl bg-orange-900 text-white px-4 ml-8 pt-4 pb-4"
               href="{{route('books.create')}}">
                Ajouter
            </a>
        </div>
        <form method="POST" action="{{route('books.index')}}" enctype="multipart/form-data">
            @csrf
            <div class="field flex mt-6">
                <div class="self-center">
                    <img src="{{asset('storage/books')}}/default.svg"
                         alt="Photo par default"/>
                </div>
                <div>
                <label for="picture" class="label">Photo de couverture : </label>
                <input type="file" name="picture" required class="@error('picture')is danger @enderror input" id="picture">
                @if($errors->first('picture'))<p class="text-red-500 text-lg mb-4">{{$errors->first('picture')}}</p>@endif
                </div>
            </div>
            <div class="field my-6">
                <label for="title" class="label">Titre :</label>
                <input id="title" name="title" required type="text" class="input @error('title')is danger @enderror"
                       value="{{ old('title') }}">
                @if($errors->first('title'))<p class="text-red-500 text-lg mb-4">{{$errors->first('title')}}</p>@endif
            </div>
            <div class="field my-6">
                <label for="author" class="label">Auteur :</label>
                <input name="author" type="text" required value="{{ old('author') }}"
                       class="input @error('author')is danger @enderror" id="author">
                @if($errors->first('author'))<p class="text-red-500 text-lg mb-4">{{$errors->first('author')}}</p>@endif
            </div>
            <div class="field my-6">
                <label for="publishing_house" class="label">Maison d'édition :</label>
                <input name="publishing_house" required type="text" value="{{ old('publishing_house') }}"
                       class="input @error('publishing_house')is danger @enderror" id="publishing_house">
                @if($errors->first('publishing_house'))<p class="text-red-500 text-lg mb-4">{{$errors->first('publishing_house')}}</p>@endif
            </div>
            <div class="field my-6">
                <label for="orientation" class="label">Orientation :</label>
                <select name="orientation" required class="input @error('orientation')is danger @enderror" id="orientation">
                    @if(!isset($book->orientation))
                        <option value="">--Choissisez une option--</option>
                    @else
                        <option value="{{ $book->orientation }}">{{ $book->orientation }}</option>
                    @endif
                    <option value="web">Web</option>
                    <option value="2D">2D</option>
                    <option value="3D">3D</option>
                </select>
                @if($errors->first('orientation'))<p class="text-red-500 text-lg mb-4">{{$errors->first('orientation')}}</p>@endif
            </div>
            <div class="field my-6">
                <label for="isbn" class="label">ISBN :</label>
                <input name="isbn" type="number" required value="{{ old('isbn') }}"
                       class="input @error('isbn')is danger @enderror" id="isbn">
                @if($errors->first('isbn'))<p class="text-red-500 text-lg mb-4">{{$errors->first('isbn')}}</p>@endif
            </div>
            <div class="field my-6">
                <label for="presentation" class="label">Presentation :</label>
                <textarea name="presentation" class="textarea" id="presentation">{{ old('presentation') }}</textarea>
                @if($errors->first('presentation'))<p class="text-red-500 text-lg mb-4">{{$errors->first('presentation')}}</p>@endif
            </div>
            <div class="field my-6">
                <label for="public_price" class="label">Prix public :</label>
                <input name="public_price" required value="{{ old('public_price') }}"
                       class="input @error('public_price')is danger @enderror" id="public_price" type="number">
                @if($errors->first('public_price'))<p class="text-red-500 text-lg mb-4">{{$errors->first('public_price')}}</p>@endif
            </div>
            <div class="field my-6">
                <label for="proposed_price" class="label">Prix proposé :</label>
                <input name="proposed_price" required class="input @error('proposed_price')is danger @enderror"
                       value="{{ old('proposed_price') }}" id="proposed_price" type="number">
                @if($errors->first('proposed_price'))<p class="text-red-500 text-lg mb-4">{{$errors->first('proposed_price')}}</p>@endif
            </div>
            <div class="field my-6">
                <label for="stock" class="label">Stock :</label>
                <input name="stock" required class="input @error('stock')is danger @enderror" value="{{ old('stock') }}"
                       id="stock" type="number">
                @if($errors->first('stock'))<p class="text-red-500 text-lg mb-4">{{$errors->first('stock')}}</p>@endif
            </div>
            <div class="field flex flex-col justify-center mt-6">
                <button class="rounded-xl border p-3 inline">Sauvegarder ce livre</button>
                <button class="rounded-xl block mt-6 bg-orange-900 text-white px-3 pt-6 pb-6" type="submit">Créer un nouveau livre</button>
            </div>
        </form>
    </div>
@endsection
