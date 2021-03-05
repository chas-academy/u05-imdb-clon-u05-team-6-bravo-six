@extends('layouts.admin')
@section('content')
<a class="btn btn-primary btn-lg" href=" {{action([\App\Http\Controllers\Admin\TitleController::class, 'create'])}} ">Create new title</a>
<table>
<thead>
    <tr>
        <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'index'], ['sort' => 'id'])}}">Id</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'index'], ['sort' => 'title'])}}">Title</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'index'], ['sort' => 'genre_id'])}}">Primary Genre</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'index'], ['sort' => 'created_at'])}}">Posted at</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'index'], ['sort' => 'updated_at'])}}">Updated at</a></th>
        <th></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'index'], ['sort' => 'user_id'])}}">Posted by</a></th>
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
    <td>
        <x-image-layout :user="$user"></x-image-layout>
    </td>
    <td>{{$title->user()->name}}</td>
    <td><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'show'], ['title' => $title->id])}}">View</a></td>
</tr>
@endforeach

</tbody>
</table>
<div class="container">{{$titles->appends(['sort' => $sort])->links()}}</div>
@endsection