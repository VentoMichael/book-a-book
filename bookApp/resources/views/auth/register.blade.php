@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('EMail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>




                        <div class="form-group row">
                            <p>Je suis un étudiant en :</p>

                            <div class="col-md-6">
                                <p>Web</p>
                                <input type="radio" name="group" value="1"
                                       id="1_W" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="1_W">1<sup>er</sup></label>
                                <input type="radio" name="group" value="2"
                                       id="2_W" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="2_W">2<sup>éme</sup></label>
                                <input type="radio" name="group" value="3"
                                       id="3_W" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="3_W">3<sup>éme</sup></label>


                                <p>2D</p>
                                <input type="radio" name="group" value="1"
                                       id="1_2D" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="1_2D">1<sup>er</sup></label>
                                <input type="radio" name="group" value="2"
                                       id="2_2D" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="2_2D">2<sup>éme</sup></label>
                                <input type="radio" name="group" value="3"
                                       id="3_2D" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="3_2D">3<sup>éme</sup></label>

                                <p>3D</p>
                                <input type="radio" name="group" value="1"
                                       id="1_3D" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="1_3D">1<sup>er</sup></label>
                                <input type="radio" name="group" value="2"
                                       id="2_3D" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="2_3D">2<sup>éme</sup></label>
                                <input type="radio" name="group" value="3"
                                       id="3_3D" class="form-control @error('group') is-invalid @enderror" required
                                       autocomplete="group"/> <label for="3_3D">3<sup>éme</sup></label>


                                @error('group')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
