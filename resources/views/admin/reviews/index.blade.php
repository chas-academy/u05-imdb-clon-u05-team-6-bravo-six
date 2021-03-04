@extends('layouts.admin')
@section('content')
<h1>Reviews</h1>
<table>
    <thead>
        <tr>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'id'])}}">Id:</a></th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'title'])}}">Title:</a></th>
            <th>Body:</th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'rating'])}}">Rating:</a>&nbsp&nbsp</th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'created_at'])}}">Created:</a></th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'rating'])}}">Updated:</a></th>
            <th></th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'user_id'])}}">Reviewer:</a></th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'title_id'])}}">Title reviewed:</a></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}.&nbsp&nbsp</td>
                <td><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class,
                    'show'], ['review' => $review->id])}}">{{$review->title}}</a>&nbsp&nbsp</td>
                <td>{{strlen($review->body) > 50 ? substr($review->body,0,50)."...": $review->body}}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->created_at }}</td>
                <td>{{ $review->updated_at }}</td>
                <td><x-image-layout :user="$user"></x-image-layout></td>
                <td><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'show'], ['user' => $review->user()->id])}}">{{ $review->user()->name }}</a></td>
                <td><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'show'], ['title' => $review->title()->id])}}">{{ $review->title()->title }}</a></td>
            </tr>
    @endforeach
    </tbody>
</table>
<div class="container">{{$reviews->appends(['sort' => $sort])->links()}}</div>
@endsection