@extends('layouts.app')
@section('content')
<ul>
@foreach ($reviews as $review)
<li>
<div>
    <a href="{{action([App\Http\Controllers\ReviewController::class, 'show'], ["review"=>$review->id])}}">{{$review->body}}</a>
</div>
</li>
@endforeach
</ul>
@endsection
