@extends('layouts.admin')
@section('content')
<form method="POST" action="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'store'])}}">
    @csrf

    <div class="form-group">
        <label>Name: </label>
        <input class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>User ID: </label>
        <input class="form-control" name="user_id">
    </div>
    <label for="name">Make it public?</label>
    <input class="form-control" type="checkbox" class="form-control" name="public">
    <button class="btn btn-secondary btn-lg" type="submit" value="Update">Create watchlist</button>
</form>
@endsection