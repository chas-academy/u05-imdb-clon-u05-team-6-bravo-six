@extends('layouts.admin')
@section('content')
<h1>Genres</h1>
<a class="btn btn-primary btn-lg" href=" {{action([\App\Http\Controllers\Admin\GenreController::class, 'create'])}} ">Create new genre</a>
<table>
    <thead>
        <tr>
            <th><a href="{{action([\App\Http\Controllers\Admin\GenreController::class, 'index'], ['sort' => 'id'])}}">Id:</a></th>
            <th><a href="{{action([\App\Http\Controllers\Admin\GenreController::class, 'index'], ['sort' => 'name'])}}">Genre:</a></th>
            <th>Created:</th>
            <th>Updated:</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($genres as $genre)
        <tr>
        <td>{{ $genre->id }}.&nbsp&nbsp</td>
        <td><a href="{{action([\App\Http\Controllers\Admin\GenreController::class, 'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a></td>
         <td>{{$genre->created_at}}</td>
         <td>{{$genre->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="container">{{$genres->appends(['sort' => $sort])->links()}}</div>
@endsection