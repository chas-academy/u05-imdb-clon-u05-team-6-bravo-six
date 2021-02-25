@extends('layouts.admin')
@section('content')

<table>
    <thead>
        <tr>
            <th>Id:</th>
            <th>Genre:</th>
            <th>Created:</th>
            <th>Updated:</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($genres as $genre)
        <tr>
        <td>
            {{ $genre->id }}
        </td>
        <td>
            <a href="{{action([\App\Http\Controllers\Admin\GenreController::class,
             'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a>
         </td>
         <td>{{$genre->created_at}}</td>
         <td>{{$genre->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection