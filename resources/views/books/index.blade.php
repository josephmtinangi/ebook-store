@extends('layouts.app')

@section('title', 'Books')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Books</div>

                <div class="panel-body">

                    @if($books->count())
                        @foreach($books as $book)
                            @include('books.book')
                            <hr>
                        @endforeach

                        {{ $books->links() }}
                    @else
                        <div class="alert alert-info">No Book</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
