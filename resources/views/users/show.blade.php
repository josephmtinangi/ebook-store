@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }} (Joined {{ $user->created_at->diffForHumans() }})</div>

                <div class="panel-body">

                    <h4>Summary</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Books Uploaded</th>
                                    <td>{{ $user->books->count() }}</td>
                                </tr>
                                <tr>
                                    <th>Books Downloaded</th>
                                    <td>NaN</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
