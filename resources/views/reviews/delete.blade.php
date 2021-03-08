@extends('layouts.app')

@section('title', '| DELETE REVIEW?')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS REVIEW?</h1>
            <p>
                <strong>Title:</strong> {{ $review->title }}<br>
                <strong>Review:</strong> {{ $review->body }}
            </p>
            <form action="{{route('reviews.destroy', ['review' => $review->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete review</button>
            </form>
        </div>
    </div>

@endsection
