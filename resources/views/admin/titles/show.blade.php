

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
        <label>Description:</label>
        <input class="form-control" name="description" value="{{$title->description}}">
    </div>
    <div class="form-group">
        <p>Image:</p>
        <img id="title-image-update" src="{{$title->img_url}}">
        <span id="original-img-address" style="display: none">{{$title->img_url}}</span>
    </div>
    <button  class="btn btn-primary toggles-search">Select a new image</button>
    <button id="reset-img" class="btn btn-warning">Reset to saved image</button>
    <div id="hidden-absolute-container">
        <button class="btn btn-primary toggles-search">Close</button>
        <x-api-search-div title="Select a new image to associate with the title"></x-api-search-div>
    </div>
    <div class="form-group">
        <label>Primary Genre:</label>
        <x-primary-genre-select selected="{{$title->genre_id}}"></x-primary-genre-select>
    </div>
    @if ($title->img_url !== null)
    {{-- <img src="public/storage/{{$title->img_url}}" alt="No photo" > --}}
    <img src="{{ asset('storage/' . $title->img_url) }}" alt="No photo">
    @endif
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
<form method="POST" action=" {{action([\App\Http\Controllers\Admin\TitleController::class, 'destroy'], ['title' => $title->id])}} ">
    @csrf
    @method('DELETE')
<button type="submit" class="btn btn-danger btn-lg">Delete title</button>
</form>
<div class="container">
    <h3>Relationships</h3>
    <div><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'secondary_genres'], ['title' => $title->id])}}">Secondary Genres</a></div>
    <div><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'reviews'], ['title' => $title->id])}}">Reviews</a>
</div>
@endsection