@extends('layouts.app')

@section('title', 'Upload book')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Upload book
                    </h3>
                </div>

                <div class="panel-body">
                   
                    <form action="{{ route('books.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
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
