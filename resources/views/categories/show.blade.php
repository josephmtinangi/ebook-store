@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container">
    @if($category->books->count())
        @foreach($category->books->chunk(4) as $booksSet)
            <div class="row">
                @foreach($booksSet as $book)
                    <div class="col-sm-3">
                        @include('books.book')
                    </div>
                @endforeach
            </div>
        @endforeach

    @else
        <div class="alert alert-info">No Book</div>
    @endif
</div>
@endsection
