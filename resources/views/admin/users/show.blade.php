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
    <form method="POST" action="{{action([\App\Http\Controllers\Admin\UserController::class, 'destroy'], ['user' => $user->id])}}">
        @method("DELETE")
        @csrf
        <td>
            <button class="btn btn-danger btn-lg" type="submit" value="Delete">Delete</button>
        </td>
    </form>

</form>
@endsection