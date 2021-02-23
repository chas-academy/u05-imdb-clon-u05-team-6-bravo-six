@extends('layouts.admin')
@section('content')

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($genres as $genre)
        <td>
            {{ $genre->id }}
        </td>
        <td>
            <a href="{{action([\App\Http\Controllers\Admin\GenreController::class,
             'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a>
         </td>
    @endforeach
    </tbody>
</table>

@endsection