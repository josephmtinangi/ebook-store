@extends('layouts.app')

@section('title', 'Upload book')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="page-header">
              <h1>Upload book <small>to earn 15XP</small></h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                   
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description (Option)</label>
                            <textarea name="description" id="des" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Cover (Option)</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Upload</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
