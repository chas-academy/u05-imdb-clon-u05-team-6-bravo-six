@extends('layouts.admin')
@section('content')

<table>
    <thead>
        <tr>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'id'])}}">Id:</a></th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'title'])}}">Title:</a></th>
            <th>Body:</th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'rating'])}}">Rating:</a>&nbsp&nbsp</th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'created_at'])}}">Created:</a></th>
            <th><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'], ['sort' => 'rating'])}}">Updated:</a></th>
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
                <td>{{ $review->body }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->created_at }}</td>
                <td>{{ $review->updated_at }}</td>
                <td>{{ $review->user()->name }}</td>
                <td>{{ $review->title()->title }}</td>
            </tr>     
    @endforeach 
    </tbody>
</table>

@endsection