@extends('layouts.admin')
@section('content')
<h4>Showing Genre</h4>
<a href=" {{action([\App\Http\Controllers\Admin\GenreController::class, 'index'])}} ">Go back to Genres</a>
<form method="POST" id="update" action="{{action([\App\Http\Controllers\Admin\GenreController::class, 'update'], ['genre' => $genre->id])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Genre:</label>
        <input class="form-control" name="name" value="{{$genre->name}}">
    </div>
    <div class="form-group">
        <label>Created at: </label>
        <input class="form-control" disabled value="{{$genre->created_at}}">
    </div>
    <div class="form-group">
        <label>Updated at: </label>
        <input class="form-control" disabled value="{{$genre->updated_at}}">
    </div>

</form>
    <input form="update" class="btn btn-secondary btn-lg" type="submit" value="Update genre">
    <input form="delete" class="btn btn-danger btn-lg" type="submit" value="Delete genre">
    <form method="POST" id="delete" action=" {{action([\App\Http\Controllers\Admin\GenreController::class, 'destroy'], ['genre' => $genre->id])}} ">
        @csrf
        @method('DELETE')
    </form>
@endsection