@extends('layouts.admin')
@section('content')
<a href=" {{action([\App\Http\Controllers\Admin\UserController::class, 'index'])}} ">Go back to users</a>

<form method="POST" action=" {{action([\App\Http\Controllers\Admin\UserController::class, 'store'])}} ">
@csrf
    <div class="form-group">
        <label>New user</label>
        <input type="text" name="user" class="form-control" required>
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="example@example.com" required>
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
        <label>Password confirmation</label>
        <input type="password" name="password_confirmation" id="password-confirm" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
</form>

@endsection