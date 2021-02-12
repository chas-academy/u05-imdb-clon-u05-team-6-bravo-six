@extends('layouts.app')
@section('content')

<ul>
@foreach ($reviews as $review)
    <li>
        <p>{{$review->body}}</p>
        <span>Rating: {{$review->rating}} </span>
    </li>
    </br>
@endforeach
</ul>

@endsection