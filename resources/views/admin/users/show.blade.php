@extends('layouts.admin')
@section('content')
<form method="POST" action="{{action([\App\Http\Controllers\Admin\UserController::class, 'update'], ['user' => $user->id])}}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Id:</label>
        <input class="form-control" name="user" disabled value="{{$user->id}}">
    </div>
    <div class="form-group">
        <label>Name: </label>
        <input class="form-control" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label>Email: </label>
        <input class="form-control" name="email" value="{{$user->email}}">
    </div>
    <button class="btn btn-secondary btn-lg" type="submit">Save changes</button>
</form>
{{-- <div class="container">
    <h3>Relationships</h3>
    <div><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'secondary_genres'], ['user' => $user->id])}}">Secondary Genres</a></div>
    <div><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'reviews'], ['user' => $user->id])}}">Reviews</a>
</div> --}}
@endsection