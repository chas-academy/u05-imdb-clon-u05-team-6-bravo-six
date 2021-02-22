@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $review->title()->title }}</h1>
            <p>{{ $review->body }}</p>
            <hr>
            <p>Posted In: {{ $review->title()->genre()->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($review->comments() as $comment)
                <div class="comment">
                    <p><strong>Name:</strong> {{ $comment->name }}</p>
                    <p><strong>Comment:</strong><br/>{{ $comment->body }}</p><br>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            {{-- no worky --}}
            <form action=" {{action([\App\Http\Controllers\CommentController::class, 'store'])}} " method="POST"> 
                @csrf
                <input type="hidden" name="review_id" value="{{$review->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <label for="comment">Comment</label>
                        <input name="comment" id="comment" type="text" >
                        <button type="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

