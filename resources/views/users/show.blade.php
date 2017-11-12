@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                
                <div class="well">
                    <h3>{{ $user->name }}</h3>
                    <p>Joined {{ $user->created_at->diffForHumans() }}</p>
                    <p>
                        <a class="btn btn-primary btn-lg">Follow</a>
                    </p>
                </div>

            </div>
            <div class="col-sm-8">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#books" aria-controls="books" role="tab" data-toggle="tab">Books <span class="badge">0</span></a>
                        </li>
                        <li role="presentation">
                            <a href="#followers" aria-controls="followers" role="tab" data-toggle="tab">Followers <span class="badge">0</span></a>
                        </li>
                        <li role="presentation">
                            <a href="#following" aria-controls="following" role="tab" data-toggle="tab">Following <span class="badge">0</span></a>
                        </li>
                    </ul>
                
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="books">
                            
                            @if($user->books()->count())
                                @foreach($user->books as $book)
                                    <div class="media">
                                        <a class="pull-left" href="{{ route('books.show', $book->slug) }}">
                                            <img class="media-object" src="{{ $book->imageUrl() }}" class="img-responsive" alt="Image">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $book->title }}</h4>
                                            <p>{{ $book->description }}</p>
                                            <p>{{ $book->category->name }}</p>
                                            @if(Auth::check())
                                                @if(Auth::user()->id == $book->user_id)
                                                    <p>
                                                        <a href="#" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger" data-toggle="modal" href='#modal-id'><i class="fa fa-trash"></i> Delete</a>
                                                        <div class="modal fade" id="modal-id">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title">Modal title</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @else

                            @endif

                        </div>
                        <div role="tabpanel" class="tab-pane" id="followers">...</div>
                        <div role="tabpanel" class="tab-pane" id="following">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
