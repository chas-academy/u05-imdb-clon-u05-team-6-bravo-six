@extends('layouts.admin')
@section('content')
<h4>Showing review</h4>
<a href=" {{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'])}} ">Go back to Reviews</a>
<form method="POST" id="update" action="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'update'], ['review' => $review->id])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Review Title:</label>
        <input class="form-control" name="title" value="{{$review->title}}">
    </div>
    <div class="form-group">
        <label>Review:</label>
        <input class="form-control" name="body" value="{{$review->body}}">
    </div>
    
    <div class="form-group">
        <label>Created at: </label>
        <input class="form-control" disabled value="{{$review->created_at}}">
    </div>
    <div class="form-group">
        <label>Updated at: </label>
        <input class="form-control" disabled value="{{$review->updated_at}}">
    </div>
    <div class="form-group">
        <label>Posted by user: </label>
        <input class="form-control" disabled value="{{$review->user()->name}}">
    </div>


</form>
    <input form="update" class="btn btn-secondary btn-lg" type="submit" value="Update review">
    <input form="delete" class="btn btn-danger btn-lg" type="submit" value="Delete review">
    <form method="POST" id="delete" action=" {{action([\App\Http\Controllers\Admin\ReviewController::class, 'destroy'], ['review' => $review->id])}} ">
        @csrf
        @method('DELETE')
    </form>
@endsection