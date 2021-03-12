@extends('layouts.app')

@section('title', '| Edit Comment')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Edit Comment</h2>
             <form method="POST" action=" {{action([\App\Http\Controllers\CommentController::class, 'update'], ['comment' => $comment->id])}} ">
                @method('PUT')
                @csrf

            <label for=""></label>
                 <div class="form-group">
            <textarea name="comment" id="" cols="50" rows="10">
                {{$comment->body}}
            </textarea>
                 </div>
                <div>
            <button class="btn btn-primary" type="Submit">Update comment</button>
                </div>
            </form>
        </div>
    </div>

@endsection
