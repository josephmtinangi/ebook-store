@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $book->title }}</div>

                <div class="panel-body">
                    <div class="media">
                        <a class="pull-left" href="{{ route('books.show', $book->slug) }}">
                            <img class="media-object" src="{{ $book->imageUrl() }}" alt="Image">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $book->title }}</h4>
                            <p>{{ $book->description }}</p>
                            <p>Uploaded by {{ $book->user->name }}</p>
                            <p class="text-muted">{{ $book->created_at->toDateTimeString() }}</p>                            
                        </div>
                    </div>
                    <hr>

                    <form action="" method="POST" class="form-inline" role="form">
                    
                        <div class="form-group">
                            <label class="sr-only" for="">label</label>
                            <input type="email" class="form-control" id="" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="">label</label>
                            <input type="email" class="form-control" id="" placeholder="Email">
                        </div>
                    
                        
                    
                        <button type="submit" class="btn btn-primary">Send Download Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
