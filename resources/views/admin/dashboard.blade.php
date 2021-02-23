@extends('layouts.admin')
@section('content')
<h4>Recent activity</h4>
<div class="container col-4">
    <h5>Titles</h5>
@foreach ($titles as $title)
    <li class="card px-1"><div class="card-body">
    <a href=" {{action([\App\Http\Controllers\Admin\TitleController::class, 'show'], ['title' => $title->id])}} "><h6>{{$title->title}}</h6></a>
    <small>Updated at {{$title->updated_at}} </small>    
    </div></li>
@endforeach
</div>


@endsection