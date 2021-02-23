@extends('layouts.admin')
@section('content')
<h2>Comments</h2>
<table>
<thead>
    <tr>
        <th>Id</th>
        <th>Posted on (review)</th>
        <th>Created at</th>
        <th>Updated at</th>
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
    <td>{{$comment->user()->name}}</td>
        <td><a href="{{action([\App\Http\Controllers\Admin\CommentController::class, 'show'], ['comment' => $comment->id])}}">View</a></td>
</tr>
@endforeach

</tbody>
</table>
<div class="container">{{$comments->links()}}</div>
@endsection