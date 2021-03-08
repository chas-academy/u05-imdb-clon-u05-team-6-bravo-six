@extends('layouts.admin')
@section('content')
<a href=" {{action([\App\Http\Controllers\Admin\GenreController::class, 'index'])}} ">Go back to genres</a>
<form method="POST" action=" {{action([\App\Http\Controllers\Admin\GenreController::class, 'store'])}} ">
@csrf
    <div class="form-group">
        <label>New genre</label>
        <input type="text" name="genre" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
</form>

@endsection