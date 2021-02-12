@extends('layouts.app')
@section('content')

@foreach ($titles as $title)

<div>
    <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$title->id])}}">{{$title->title}}</a>
</div>
@endforeach

@endsection