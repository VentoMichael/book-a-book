@extends('layouts.app')

@section('content')
    <h2>
        Destroy
    </h2>
    <form method='POST' action="{{ route('book.destroy', ['book' => $book->name]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete Post" />
    </form>

@endsection
