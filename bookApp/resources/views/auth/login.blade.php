@extends('layouts.app')

@section('content')
        <div class="card mx-4 my-0 mt-12">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="sm:flex sm:justify-between">
                        <div class="form-group row sm:w-5/12">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="rounded-xl p-2 px-3 w-full border border-orange-900 @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="alert">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-8 sm:mt-0 sm:w-5/12">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="rounded-xl p-2 px-3 w-full border border-orange-900 form-control @error('password')is-invalid @enderror"
                                       name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="alert">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <button type="submit"
                                    class="mb-2 w-full block rounded-xl block mt-12 bg-orange-900 text-white p-3">
                                {{ __('Se connecter') }}
                            </button>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Se souvenir de moi') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                @if (Route::has('register'))
                                    <a class="btn btn-link underline mt-6" href="{{ route('register') }}">
                                        {{ __('S\'inscrire') }}
                                    </a>
                                @endif
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link underline mt-6" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
