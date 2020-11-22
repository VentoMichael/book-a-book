@extends('layouts.app')

@section('content')
    <div class="relative">
        <a class="backLink text-transparent text-xl relative text-2xl" title="Retour en arrière" href="{{route('books.index')}}">Retour
            en arrière</a>
        <h2 class="hidden">
            Create a new book
        </h2>
        @include('partials.cta-menu')
        <form method="POST" action="{{route('books.index')}}" class="sm:gap-12 sm:grid sm:grid-cols-2"
              enctype="multipart/form-data">
            @csrf
            <div class="field flex mt-8 flex-col">
                <div class="self-center mb-2">
                    <img src="{{asset('storage/books')}}/default.svg"
                         alt="Photo par default"/>
                </div>
                <div>
                    <label for="picture" class="label mb-2">Photo de couverture : </label>
                    <input type="file" name="picture" required
                           class="whitespace-normal w-full border rounded-lg p-2 @error('picture')is danger @enderror input"
                           id="picture">
                    @if($errors->first('picture'))<p
                        class="text-red-500 text-lg mb-4">{{$errors->first('picture')}}</p>@endif
                </div>
            </div>
            <div class="field my-6 flex flex-col sm:self-end sm:mb-0">
                <label for="title" class="label">Titre :</label>
                <input id="title" name="title" required type="text"
                       class="border rounded-lg p-3 pb-2 input @error('title')is danger @enderror"
                       value="{{ old('title') }}">
                @if($errors->first('title'))<p class="text-red-500 text-lg mb-4">{{$errors->first('title')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="author" class="label">Auteur :</label>
                <input name="author" type="text" required value="{{ old('author') }}"
                       class="border rounded-lg p-3 pb-2 input @error('author')is danger @enderror" id="author">
                @if($errors->first('author'))<p class="text-red-500 text-lg mb-4">{{$errors->first('author')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="publishing_house" class="label">Maison d'édition :</label>
                <input name="publishing_house" required type="text" value="{{ old('publishing_house') }}"
                       class="border rounded-lg p-3 pb-2 input @error('publishing_house')is danger @enderror"
                       id="publishing_house">
                @if($errors->first('publishing_house'))<p
                    class="text-red-500 text-lg mb-4">{{$errors->first('publishing_house')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="orientation" class="label">Orientation :</label>
                <select name="orientation" required
                        class="border bg-white rounded-lg p-3 input @error('orientation')is danger @enderror" id="orientation">
                    @if(!isset($book->orientation))
                        <option value="">--Choissisez une option--</option>
                    @else
                        <option value="{{ $book->orientation }}">{{ $book->orientation }}</option>
                    @endif
                    <option value="web">Web</option>
                    <option value="2D">2D</option>
                    <option value="3D">3D</option>
                </select>
                @if($errors->first('orientation'))<p
                    class="text-red-500 text-lg mb-4">{{$errors->first('orientation')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="academic_years" class="label">Année académique :</label>
                <select name="academic_years" required
                        class="border bg-white rounded-lg p-3 input @error('academic_years')is danger @enderror" id="academic_years">
                    @if(!isset($book->academic_years))
                        <option value="">--Choissisez une option--</option>
                    @else
                        <option value="{{ $book->academic_years }}">{{ $book->academic_years }}</option>
                    @endif
                    <option value="1">1<sup>ére</sup></option>
                    <option value="2">2<sup>éme</sup></option>
                    <option value="3">3<sup>éme</sup></option>
                </select>
                @if($errors->first('academic_years'))<p
                    class="text-red-500 text-lg mb-4">{{$errors->first('academic_years')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="isbn" class="label">ISBN :</label>
                <input name="isbn" type="number" required value="{{ old('isbn') }}"
                       class="border rounded-lg p-3 pb-2 input @error('isbn')is danger @enderror" id="isbn">
                @if($errors->first('isbn'))<p class="text-red-500 text-lg mb-4">{{$errors->first('isbn')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="presentation" class="label">Presentation :</label>
                <textarea name="presentation" class="border rounded-md p-3 pb-2 h-32"
                          id="presentation">{{ old('presentation') }}</textarea>
                @if($errors->first('presentation'))<p
                    class="text-red-500 text-lg mb-4">{{$errors->first('presentation')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="public_price" class="label">Prix public :</label>
                <input name="public_price" required value="{{ old('public_price') }}"
                       class="border rounded-lg p-3 pb-2 input @error('public_price')is danger @enderror"
                       id="public_price" type="number">
                @if($errors->first('public_price'))<p
                    class="text-red-500 text-lg mb-4">{{$errors->first('public_price')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="proposed_price" class="label">Prix proposé :</label>
                <input name="proposed_price" required
                       class="border rounded-lg p-3 pb-2 input @error('proposed_price')is danger @enderror"
                       value="{{ old('proposed_price') }}" id="proposed_price" type="number">
                @if($errors->first('proposed_price'))<p
                    class="text-red-500 text-lg mb-4">{{$errors->first('proposed_price')}}</p>@endif
            </div>
            <div class="field my-6 flex flex-col">
                <label for="stock" class="label">Stock :</label>
                <input name="stock" required class="border rounded-lg p-3 pb-2 input @error('stock')is danger @enderror"
                       value="{{ old('stock') }}"
                       id="stock" type="number">
                @if($errors->first('stock'))<p class="text-red-500 text-lg mb-4">{{$errors->first('stock')}}</p>@endif
            </div>
            <button name="save" type="submit" class="duration-300 w-full rounded-xl mt-6 p-3 border hover:bg-orange-900 hover:text-white">Sauvegarder ce livre
            </button>
            <button name="publish" class="w-full rounded-xl mt-6 bg-orange-900 text-white p-3" type="submit">Créer un nouveau livre
            </button>
        </form>
    </div>
@endsection
