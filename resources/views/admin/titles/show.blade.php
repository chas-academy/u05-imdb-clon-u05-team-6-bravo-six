

@extends('layouts.admin')
@section('content')
<h4>Viewing title</h4>
<a href=" {{action([\App\Http\Controllers\Admin\TitleController::class, 'index'])}} ">Go back to titles</a>
<form method="POST" action="{{action([\App\Http\Controllers\Admin\TitleController::class, 'update'], ['title' => $title->id])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Title:</label>
        <input class="form-control" name="title" value="{{$title->title}}">
    </div>
    <div class="form-group">
        <label>Primary Genre:</label>
        <x-primary-genre-select selected="{{$title->genre_id}}"></x-primary-genre-select>
    </div>
    
    <div class="form-group">
        <label>Created at: </label>
        <input class="form-control" disabled value="{{$title->created_at}}">
    </div>
    <div class="form-group">
        <label>Updated at: </label>
        <input class="form-control" disabled value="{{$title->updated_at}}">
    </div>
    <div class="form-group">
        <label>Created by: </label>
        <input class="form-control" disabled value="{{$title->user()->name}}">
    </div>
    <button class="btn btn-secondary btn-lg" type="submit">Save changes</button> 
</form>
<div class="container">
    <h3>Relationships</h3>
    <div><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'secondary_genres'], ['title' => $title->id])}}">Secondary Genres</a></div>
    <div><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'reviews'], ['title' => $title->id])}}">Reviews</a>
</div>
@endsection