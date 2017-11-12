@extends('layouts.app')

@section('title', 'Best electronic books')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        <p>Best ebooks</p>
        <p>
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg">Browse Books</a>
        </p>
    </div>
</div>
@endsection
