@extends('layouts.app')
@section('content')

<ul>
@foreach ($reviews as $review)
    <li>
        <a href=" {{action([App\Http\Controllers\ReviewController::class, 'show', ['id' => $review->id]])}} ">Go to review</a>
        <p>{{$review->body}}</p>
        <span>Rating: {{$review->rating}} </span>
    </li>
    <br/>
@endforeach
</ul>

@endsection