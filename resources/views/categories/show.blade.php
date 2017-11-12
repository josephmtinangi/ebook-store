@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container">

    <div class="page-header">
      <h1>{{ $category->name }}<small> ({{ $count = $category->booksCount() }} {{ str_plural('Book', $count) }})</small></h1>
    </div>

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
    @endif
</div>
@endsection
