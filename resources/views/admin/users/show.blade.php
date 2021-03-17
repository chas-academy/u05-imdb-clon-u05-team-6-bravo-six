@extends('layouts.admin')
@section('content')
<a href=" {{action([\App\Http\Controllers\Admin\UserController::class, 'index'])}} ">Go back to Users</a>
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
    <div class="form-group">
    @if ($user->img_url !== null)
            <img src="{{ asset('storage/' . $user->img_url) }}" alt="No photo" class="rounded-circle" style="max-width: 200px">
    @else
    <img src="https://crestedcranesolutions.com/wp-content/uploads/2013/07/facebook-profile-picture-no-pic-avatar.jpg" alt="No profile picture" class="rounded-circle" style="max-width: 200px">
    @endif
    </div>
    <a class="btn btn-success btn-lg" href="{{action([App\Http\Controllers\Admin\UploadController::class, 'uploadFormAdmin'], ['user_id' => $user->id])}}">Upload profile picture</a>
    <button class="btn btn-secondary btn-lg" type="submit" value="Update">Save changes</button>
</form>
    <form method="POST" action="{{action([\App\Http\Controllers\Admin\UserController::class, 'destroy'], ['user' => $user->id])}}">
        @method("DELETE")
        @csrf
        <td>
            <button class="btn btn-danger btn-lg" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
        </td>
    </form>
    <form method="POST" action="{{action([\App\Http\Controllers\Admin\UserController::class, 'update'], ['user' => $user->id])}}">
        @csrf
        @method('PUT')
        @if ($user->user_admin === 1)
        <div class="form-check">
            <input type="hidden">
            <input class="form-check-input" id="flexCheckDefault" name="user_admin" type="checkbox" value="1" checked>
            <label class="form-check-label" for="flexCheckDefault">Assign user as admin</label>
        </div>
        @else
        <div class="form-check">
            <input type="hidden">
            <input class="form-check-input" id="flexCheckDefault" name="user_admin" type="checkbox" value="0">
            <label class="form-check-label" for="flexCheckDefault">Assign user as admin</label>
        </div>
        @endif
    </form>

@endsection