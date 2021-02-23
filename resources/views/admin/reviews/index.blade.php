@extends('layouts.admin')
@section('content')

<table>
    <thead>
        <tr>
            <th>Id:</th>
            <th>Title:</th>
            <th>Body:</th>
            <th>Rating:</th>
            <th>Created:</th>
            <th>Updated:</th>
            <th>User id:</th>
            <th>Title id:</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($reviews as $review)
        <tr>
            <td>{{ $review->id }}</td>
            <td><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class,
                'show'], ['review' => $review->id])}}">{{$review->title}}</a></td>
            <td>{{ $review->body }}</td>
            <td>{{ $review->rating }}</td>
            <td>{{ $review->created_at }}</td>
            <td>{{ $review->updated_at }}</td>
            <td>{{ $review->user_id }}</td>
            <td>{{ $review->title_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection