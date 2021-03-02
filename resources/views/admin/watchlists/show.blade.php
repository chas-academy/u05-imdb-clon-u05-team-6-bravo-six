@extends('layouts.admin')
@section('content')
<a href=" {{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'])}} ">Go back to watchlists</a>
<form method="POST" action="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'update'], ['watchlist' => $watchlist->id])}}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Id:</label>
        <input class="form-control" name="watchlist" disabled value="{{$watchlist->id}}">
    </div>
    <div class="form-group">
        <label>Name: </label>
        <input class="form-control" name="name" value="{{$watchlist->name}}">
    </div>
    <div class="form-group">
        <label>User ID: </label>
        <input class="form-control" name="user_id" disabled value="{{$watchlist->user_id}}">
    </div>
    <button class="btn btn-secondary btn-lg" type="submit" value="Update">Save changes</button>
</form>
    <form method="POST" action="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'destroy'], ['watchlist' => $watchlist->id])}}">
        @method("DELETE")
        @csrf
        <td>
            <button class="btn btn-danger btn-lg" type="submit" value="Delete">Delete</button>
        </td>
    </form>
@endsection