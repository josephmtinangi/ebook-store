@extends('layouts.app')

@section('title', 'Books')

@section('content')
<div class="container">
    <h2 class="text-center">All Books</h2>
    @if($books->count())
        @foreach($books->chunk(4) as $booksSet)
            <div class="row">
                @foreach($booksSet as $book)
                    <div class="col-sm-3">
                        @include('books.book')
                    </div>
                @endforeach
            </div>
        @endforeach

        {{ $books->links() }}
    @else
        <div class="alert alert-info">No Book</div>
    @endif
</div>
@endsection
