@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $category->name }}</div>

                <div class="panel-body">
                    
                    @if($category->books->count())
                        @foreach($category->books as $book)
                            @include('books.book')
                            <hr>
                        @endforeach
                    @else
                        <div class="alert alert-info">No Book</div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
