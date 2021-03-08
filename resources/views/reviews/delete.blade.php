@extends('main')

@section('title', '| DELETE REVIEW?')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS REVIEW?</h1>
            <p>
                <strong>Title:</strong> {{ $review->title }}<br>
                <strong>Review:</strong> {{ $review->review }}
            </p>
            <form action="{{action(['route' => ['reviews.destroy', $review->review], 'method' => 'DELETE'])}}" >
                @csrf
                <button onsubmit="" class="btn">Delete review</button>
            </form>
        </div>
    </div>

@endsection
