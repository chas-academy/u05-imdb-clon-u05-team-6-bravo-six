@extends('layouts.admin')
@section('content')

<table>
<thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Primary Genre</th>
        <th>Posted at</th>
        <th>Updated at</th>
        <th>Posted by</th>
    </tr>
</thead>
<tbody>
@foreach ($titles as $title)
<tr>
    <td>{{$title->id}}</td>
    <td><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'show'], ['title' => $title->id])}}">{{$title->title}}</a></td>
    <td>{{$title->genre()->name}}</td>
    <td>{{$title->created_at}}</td>
    <td>{{$title->updated_at}}</td>
    <td>{{$title->user()->name}}</td>
</tr>
@endforeach

</tbody>
</table>
<div class="container">{{$titles->links()}}</div>
@endsection