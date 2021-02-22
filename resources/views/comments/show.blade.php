@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$comment->title_id])}}">
                <h1>{{ $review->title()->title }}</h1>
            </a>
            
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

@endsection

