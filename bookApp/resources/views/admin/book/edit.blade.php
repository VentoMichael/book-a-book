@extends('layouts.app')

@section('content')
    <div class="relative">
        <a class="backLink text-transparent text-xl absolute" title="Retour en arrière" href="{{route('books.index')}}">Retour en arrière</a>
    <h2 class="hidden">
        Edit
    </h2>
    <form method="POST" class="sm:gap-12 sm:grid sm:grid-cols-2" action="{{ route('books.show',['book'=>$book->title]) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="field flex mt-8 flex-col">
            @if($book->picture)
                <div class="self-center mb-2">
                    <img src="{{ asset('storage/'.$book->picture) }}" alt="Photo de couverture de {{$book->title}}">
                </div>
            @endif
            <label for="picture" class="label mb-2">Photo de couverture</label>
            <input type="file" name="picture" class="whitespace-normal w-full border rounded-lg p-2 @error('picture')is danger @enderror input" id="picture">
            <p class="text-red-500 text-lg mb-4">{{$errors->first('picture')}}</p>
        </div>
        <div class="field my-6 flex flex-col sm:self-end sm:mb-0">
            <label for="title" class="label">Titre</label>
            <input id="title" name="title" type="text" class="border rounded-lg p-3 pb-2 input @error('title')is danger @enderror"
                   value="{{ $book->title }}">
            <p class="text-red-500 text-lg mb-4">{{$errors->first('title')}}</p>
        </div>
        <div class="field my-6 flex flex-col">
            <label for="author" class="label">Auteur</label>
            <input name="author" type="text" value="{{ $book->author }}"
                   class="border rounded-lg p-3 pb-2 input @error('author')is danger @enderror" id="author">
            <p class="text-red-500 text-lg mb-4">{{$errors->first('author')}}</p>
        </div>
        <div class="field my-6 flex flex-col">
            <label for="orientation" class="label">Orientation</label>
            <select name="orientation" class="border rounded-lg p-3 input @error('orientation')is danger @enderror" id="orientation">
                @if(!isset($book->orientation))
                    <option value="">--Choissisez une option--</option>
                @else
                    <option value="{{ $book->orientation }}">{{ $book->orientation }}</option>
                @endif
                <option value="web">Web</option>
                <option value="2D">2D</option>
                <option value="3D">3D</option>
            </select>
            <p class="text-red-500 text-lg mb-4">{{$errors->first('orientation')}}</p>
        </div>
        <div class="field my-6 flex flex-col">
            <label for="publishing_house" class="label">Maison d'édition</label>
            <input name="publishing_house" type="text" value="{{ $book->publishing_house }}"
                   class="border rounded-lg p-3 pb-2 input @error('publishing_house')is danger @enderror" id="publishing_house">
            <p class="text-red-500 text-lg mb-4">{{$errors->first('publishing_house')}}</p>
        </div>
        <div class="field my-6 flex flex-col">
            <label for="isbn" class="label">ISBN</label>
            <input name="isbn" type="number" value="{{ $book->isbn }}" class="input border rounded-lg p-3 pb-2 @error('isbn')is danger @enderror"
                   id="isbn">
            <p class="text-red-500 text-lg mb-4">{{$errors->first('isbn')}}</p>
        </div>
        <div class="field my-6 flex flex-col">
            <label for="public_price" class="label">Prix public</label>
            <input name="public_price" value="{{ $book->public_price }}"
                   class="input border rounded-lg p-3 pb-2 @error('public_price')is danger @enderror" id="public_price" type="number">
            <p class="text-red-500 text-lg mb-4">{{$errors->first('public_price')}}</p>
        </div>
        <div class="field my-6 flex flex-col">
            <label for="proposed_price" class="label">Prix proposé</label>
            <input name="proposed_price" class="input border rounded-lg p-3 pb-2 @error('proposed_price')is danger @enderror"
                   value="{{ $book->proposed_price }}" id="proposed_price" type="number">
            <p class="text-red-500 text-lg mb-4">{{$errors->first('proposed_price')}}</p>
        </div>
        <div class="field my-6 flex flex-col">
            <label for="stock" class="label">Stock</label>
            <input name="stock" class="input border rounded-lg p-3 pb-2 @error('stock')is danger @enderror" value="{{ $book->stock }}" id="stock"
                   type="number">
            <p class="text-red-500 text-lg mb-4">{{$errors->first('stock')}}</p>
        </div>
        <div class="field my-6 flex flex-col">
            <label for="presentation" class="label">Presentation</label>
            <textarea name="presentation" class="border rounded-md p-3 pb-2 h-32" id="presentation">{{ $book->presentation }}</textarea>
            <p class="text-red-500 text-lg mb-4">{{$errors->first('presentation')}}</p>
        </div>
            <button class="col-span-2 w-full rounded-xl mt-6 p-3 border hover:bg-orange-900 hover:text-white" type="submit">Mettre à jour <span>{{$book->title}}</span></button>
    </form>
    <form method='POST' action="{{ route('books.destroy',$book) }}">
        @csrf
        @method('DELETE')
        <input type="submit" class="w-full rounded-xl mt-6 bg-orange-900 text-white p-3" value="Supprimer {{$book->title}}"/>
    </form>
    </div>
@endsection
