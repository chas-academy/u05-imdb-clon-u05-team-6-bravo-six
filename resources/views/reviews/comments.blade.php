@extends('main')

<?php $review = ;
$titleTag = htmlspecialchars($review->title); ?>
@section('title', "| $titleTag")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $review->title }}</h1>
            <p>{{ $review->body }}</p>
            <hr>
            <p>Posted In: {{ $review->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($review->comments as $comment)
                <div class="comment">
                    <p><strong>Name:</strong> {{ $comment->name }}</p>
                    <p><strong>Comment:</strong><br/>{{ $comment->comment }}</p><br>
                </div>
            @endforeach
        </div>
    </div>



    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            <form action="{{action([\App\Http\Controllers\CommentController::class, 'store'])}}" method="POST">
                @csrf

            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input id="name" type="text" >
                </div>

                <div class="col-md-12">
                    <label for="comment" >Comment</label>
                    <input id="comment" type="text" >
                    <button type="Submit">Submit</button>
                </div>
            </div>
            </form>

        </div>
    </div>
@endsection

