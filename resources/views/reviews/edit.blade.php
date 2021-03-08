@extends('layouts.app')

@section('title', '| Edit Review')

@section('content')
<form class="col-lg-9 col-xl-9 float-right" action=" {{action([\App\Http\Controllers\ReviewController::class, 'update'], ['review' => $review->id])}}" method="POST">
    @method('PUT')
    @csrf
    @if (Auth::check())
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Review</h1>
            <br>
            <div class="form-group">
            <label for="rating">Choose a rating</label>
            <select class="form-control" id="rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <textarea class="form-control" placeholder="Title" name="title" id="title" type="text" required>{{$review->title}}</textarea>
        </div>
        <div class="form-group">
            <label for="body">Edit your review here</label>
            <textarea class="form-control" name="body" id="body" required>{{$review->body}}</textarea>
        </div>
        <button class="glyphicon glyphicon-trash" onsubmit="" class="btn">Update review</button>
        <form action="{{route('reviews.destroy', $review->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="glyphicon glyphicon-trash" class="btn">Delete</button>
        </form>
    </div>
</div>
</form>
@else
<p>You need to <a href="{{route('login')}}">log in</a> to make a review!</p>
@endif

@endsection