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
    <td>{{$title->title}}</td>
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