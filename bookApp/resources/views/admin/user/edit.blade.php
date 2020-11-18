@extends('layouts.app')
@section('content')
    <h2>
        Page d'édition du profil
    </h2>
    <section>
        <h2 class="hidden">
            Mes informations personelles
        </h2>
        <div>
            <img src="{{ asset('storage/'.$user->first()->file_name) }}" alt="Photo de profil de {{$user->first()->name}} {{$user->first()->surname}}">
            <p>{{$user->first()->name}} {{$user->first()->surname}}</p>
        </div>
        <div>
            <p>Mon adresse mail : {{$user->first()->email}}</p>
        </div>
    </section>
    <form method="POST" action="{{route('users.update',['user' => $user->first()->name])}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="field">
            <label for="file_name" class="label">Modifier ma photo de profil</label>
            <input type="file" name="file_name" class="@error('file_name')is danger @enderror input" id="file_name">
            <p>{{$errors->first('file_name')}}</p>
        </div>
        <div class="field">
            <label for="email" class="label">Modifier mon adresse mail</label>
            <input value="{{$user->first()->email}}" type="email" name="email" class="@error('email')is danger @enderror input" id="email">
            <p>{{$errors->first('email')}}</p>
        </div>
        <div class="field">
            <label for="password" class="label">Mon nouveau mot de passe</label>
            <input type="password" id="password" autocomplete="current-password" name="password" class="@error('password')is danger @enderror input">
            <p>{{$errors->first('password')}}</p>
        </div>
        <div class="field">
            <label for="password_confirmation" class="label">Confirmer mon nouveau mot de passe</label>
            <input type="password" name="password_confirmation" class="@error('password_confirmation')is danger @enderror input" id="password_confirmation">
            <p>{{$errors->first('password_confirmation')}}</p>
        </div>
        <div class="field">
            <button type="submit">Mettre à jour mon profil</button>
        </div>
    </form>
@endsection
