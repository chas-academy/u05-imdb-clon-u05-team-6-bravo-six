@extends('layouts.app')

@section('title', '| Edit Review')

@section('content')
<form class="col-lg-9 col-xl-9" action=" {{action([\App\Http\Controllers\ReviewController::class, 'update'], ['review' => $review->id])}}" method="POST">
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
                <?php
            $num = 6;
            for ($i = 1; $i<$num; $i++){
                echo $i === $review->rating ? "<option value='$i' selected>$i</selected>" :"<option value='$i'>$i</option>"; 
            };?>
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
        <button class="btn btn-success" class="btn">Update review</button>
    </div>
</div>
</form>
<form action="{{route('reviews.delete', $review->id)}}" method="GET">
    @csrf
    <button type="submit" class="btn btn-danger" class="btn">Delete</button>
</form>
@else
<p>You need to <a href="{{route('login')}}">log in</a> to make a review!</p>
@endif

@endsection