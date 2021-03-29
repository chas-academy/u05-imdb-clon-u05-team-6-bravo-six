@extends('layouts.admin')
@section('content')

    <h2>Reviews on <a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'show'], ['title' => $title->id])}}">{{$title->title}}</a></h2>
    <table>
        <thead>
            <tr>
                <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'reviews'], ['title' => $title->id, 'sort' => 'id'])}}">Id</a></th>
                <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'reviews'], ['title' => $title->id, 'sort' => 'title'])}}">Review title</a></th>
                <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'reviews'], ['title' => $title->id, 'sort' => 'body'])}}">Excerpt</a></th>
                {{-- <th></th> --}}
                <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'reviews'], ['title' => $title->id, 'sort' => 'user'])}}">Posted by</a></th>
                <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'reviews'], ['title' => $title->id, 'sort' => 'created_at'])}}">Created at</a></th>
                <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'reviews'], ['title' => $title->id, 'sort' => 'updated_at'])}}">Updated at</a></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->title}}</td>
                <td>{{strlen($review->body) > 50 ? substr($review->body,0,50)."...": $review->body}}</td>
                {{-- <td><x-image-layout :user="$review->user()"></x-image-layout></td> --}}
                <td>{{$review->user()->name}}</td>
                <td>{{$review->created_at}}</td>
                <td>{{$review->updated_at}}</td>
                <td><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'show'], ['review' => $review->id])}}">View</a></td>
            </tr>
            @endforeach
        </tbody>
@endsection