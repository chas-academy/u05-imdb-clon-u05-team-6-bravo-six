@extends('layouts.app')

@section('title', '| Edit Comment')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>
            {{-- Correct action address? --}}
            <form method="POST" action=" {{action([\App\Http\Controllers\CommentController::class, 'update'], ['comment' => $comment->id])}} ">
                @method('PUT')
                @csrf

            <label for=""></label>
            <textarea name="comment" id="" cols="30" rows="10">
                {{$comment->body}}
            </textarea>
            <button onsubmit="" class="btn">Update comment</button>
            </form>
        </div>
    </div>

@endsection
