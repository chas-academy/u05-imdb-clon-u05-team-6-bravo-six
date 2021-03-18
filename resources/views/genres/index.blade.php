@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-9 col-xs-12">
<h1>Movies</h1>
<p>Use our search function to search regardless of specific genre!</p>
        <div class="navbar-nav ml-auto justify-content-end">
                <form class="form-inline my-2 my-lg-0" action="/search" method="GET" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control mr-sm-2" placeholder="Search for..." name="q">
                        <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
                    </div>
                </form>
        </div>
<h2>Genres</h2>
<p>Browse for movies by genre here.</p>
<ul class="row list-unstyled">
@foreach ($genres as $genre)
    <li class="col-md-4 col-sm-6 col-xs-12 p-2">
        <div class="card px-2">
        <a href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $genre->id])}}"><h4>{{$genre->name}}</h4></a>
        <small class="text-muted">{{$genre->titles()->count() + $genre->titlesSecondary()->get()->count()}} movies</small>
        </div>
    </li>
@endforeach
</ul>
</div>
<x-navigation-aside></x-navigation-aside>
</div>
@endsection