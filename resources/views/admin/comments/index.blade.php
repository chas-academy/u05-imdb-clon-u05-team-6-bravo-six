@extends('layouts.admin')
@section('content')
<h2>Comments</h2>
<table>
<thead>
    <tr>
        <th><a href=" {{action([\App\Http\Controllers\Admin\CommentController::class, 'index'], ['sort' => 'id'])}} ">Id</a></th>
        <th>Posted on (review)</th>
        <th><a href=" {{action([\App\Http\Controllers\Admin\CommentController::class, 'index'], ['sort' => 'created_at'])}} ">Created At</a></th>
        <th><a href=" {{action([\App\Http\Controllers\Admin\CommentController::class, 'index'], ['sort' => 'updated_at'])}} ">Updated At</a></th>
        <th></th>
        <th>Posted by</th>
                <th></th>
    </tr>
</thead>
<tbody>
@foreach ($comments as $comment)
<tr>
    <td>{{$comment->id}}</td>
    <td>{{$comment->review()->id}}</td>
    <td>{{$comment->created_at}}</td>
    <td>{{$comment->updated_at}}</td>
    <td><x-image-layout :user="$user"></x-image-layout></td>
    <td>{{$comment->user()->name}}</td>
        <td><a href="{{action([\App\Http\Controllers\Admin\CommentController::class, 'show'], ['comment' => $comment->id])}}">View</a></td>
</tr>
@endforeach

</tbody>
</table>
<div class="container">{{$comments->appends(['sort' => $sort])->links()}}</div>
@endsection