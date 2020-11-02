@extends('layouts.app')
@section('content')
    @if(Auth::user()->is_administrator)
        @include('partials.search-form')
        <section>
            <h2>
                Mince ! Vous avez renseigné un mauvais champ, ressayez avec le champ de recherches ci-dessus ou <a
                    href="{{asset('/')}}">retourner à la page d'accueil</a>
            </h2>
        </section>
    @endif
@endsection
