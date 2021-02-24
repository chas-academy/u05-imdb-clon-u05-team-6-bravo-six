@extends('layouts.admin')
@section('content')
<h2>Edit genres associated with <a href="{{action([App\Http\Controllers\Admin\TitleController::class, 'show'], ['title' => $title->id])}}">{{$title->title}}</a></h2>
<form method="POST" action="{{action([\App\Http\Controllers\Admin\TitleController::class, 'update_genres'], ['title' => $title->id])}}">
    @csrf
    @method('PUT')
    @foreach($all as $genre)
        <div class="form-check">
            @if($genres->where('genre_id', $genre->id)->count() !== 0)
                <input class="form-check-input" id="{{$genre->id}}" type="checkbox" name="{{$genre->id}}" checked>
            @else 
                <input  class="form-check-input" id="{{$genre->id}}" type="checkbox" name="{{$genre->id}}">
            @endif
            <label class="form-check-label" for="{{$genre->id}}">{{$genre->name}}</label>
        </div>
    @endforeach
    <button class="btn btn-lg btn-secondary" type="submit">Submit changes</button>
</form>
@endsection