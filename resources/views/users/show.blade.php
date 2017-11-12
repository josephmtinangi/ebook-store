@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="jumbotron">
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p>Joined {{ $user->created_at->diffForHumans() }}</p>
        <p>
            <a class="btn btn-primary btn-lg">Follow</a>
        </p>
    </div>
</div>

<div class="container">
    <div class="profile">
        <div class="row">
            <div class="col-sm-4">
                <i class="fa fa-upload"></i>
                <h4>NaN</h4>
                <p>XP</p>
            </div>
            <div class="col-sm-4">
                <i class="fa fa-upload"></i>
                <h4>{{ $user->books->count() }}</h4>
                <p>Books Uploaded</p>
            </div>
            <div class="col-sm-4">
                <i class="fa fa-upload"></i>
                <h4>NaN</h4>
                <p>Books Downloaded</p>
            </div>
        </div>
    </div>
</div>
@endsection
