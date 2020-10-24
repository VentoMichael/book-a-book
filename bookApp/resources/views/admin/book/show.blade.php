@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_administrator)
        <section>
            <h2>
                {{$book->title}}
            </h2>
        </section>
    @endif
@endsection
