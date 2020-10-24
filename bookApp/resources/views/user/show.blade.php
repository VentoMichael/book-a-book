@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_administrator)
        {{$user->name}}
    @endif
@endsection
