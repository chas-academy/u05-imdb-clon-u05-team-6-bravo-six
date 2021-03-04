@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Search Result For:
                <small>{{$key}}</small>
            </h1>
            @foreach ($titles as $title)
                <div>
                <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$title->id])}}">{{$title->title}}</a>
            </div>
            @endforeach
        </div>
    </div>
@endsection