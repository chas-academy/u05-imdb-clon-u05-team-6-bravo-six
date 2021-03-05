

@extends('layouts.admin')
@section('content')
<h4>Viewing comment</h4>
<a href=" {{action([\App\Http\Controllers\Admin\CommentController::class, 'index'])}} ">Go back to Comments</a>
<form method="POST" id="update" action="{{action([\App\Http\Controllers\Admin\CommentController::class, 'update'], ['comment' => $comment->id])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Comment:</label>
        <input class="form-control" name="body" value="{{$comment->body}}">
    </div>

    <div class="form-group">
        <label>Created at: </label>
        <input class="form-control" disabled value="{{$comment->created_at}}">
    </div>
    <div class="form-group">
        <label>Updated at: </label>
        <input class="form-control" disabled value="{{$comment->updated_at}}">
    </div>


</form>
    <input form="update" class="btn btn-secondary btn-lg" type="submit" value="Save changes">
    <input form="delete" class="btn btn-danger btn-lg" type="submit" value="Delete comment"  onclick="return confirm('Are you sure you want to delete this comment?')">
    <form method="POST" id="delete" action=" {{action([\App\Http\Controllers\Admin\CommentController::class, 'destroy'], ['comment' => $comment->id])}} ">
        @csrf
        @method('DELETE')
    </form>
<div class="container px-6" style="margin-top: 1em">
    <h3>Relationships</h3>
    <div class="form-group">
        <label>Posted on (review):</label>

        <input class="form-control" disabled value=" {{strlen($comment->review()->body) > 50 ? substr($comment->review()->body,0,50)."...": $comment->review()->body}} ">
                <a href="#">Go to review</a>

    </div>
    <div class="form-group">
        <label>Posted by: </label>
        <input class="form-control" disabled value="{{$comment->user()->name}}">
        <a href=" {{action([\App\Http\Controllers\Admin\UserController::class, 'show'], ['user' => $comment->user()->id])}} ">Go to user</a>
    </div>
</div>
@endsection