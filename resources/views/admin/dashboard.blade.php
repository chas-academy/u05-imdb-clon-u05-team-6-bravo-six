@extends('layouts.admin')
@section('content')
<h1>Welcome to our admin-panel!</h1>
<p class="lead">
    Use this to control all content added to the site. 
    Use either the links below or above, in the header, to navigate.
    To get back to the regular site, click U05-bravo-six in the header or just <a href="{{route('home')}}">here!</a>
</p>
<div class="row">
    <div class="p-2  col-md-4 col-sm-12"><div class="card p-2"><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'index'])}}"><h3 class="font-weight-light">Titles/Movies</h3></a></div></div>
    <div class="p-2  col-md-4 col-sm-12"><div class="card p-2"><a href="{{action([\App\Http\Controllers\Admin\GenreController::class, 'index'])}}"><h3 class="font-weight-light">Genres</h3></a></div></div>
    <div class="p-2  col-md-4 col-sm-12"><div class="card p-2"><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'index'])}}"><h3 class="font-weight-light">Users</h3></a></div></div>
    <div class="p-2  col-md-4 col-sm-12"><div class="card p-2"><a href="{{action([\App\Http\Controllers\Admin\ReviewController::class, 'index'])}}"><h3 class="font-weight-light">Reviews</h3></a></div></div>
    <div class="p-2  col-md-4 col-sm-12"><div class="card p-2"><a href="{{action([\App\Http\Controllers\Admin\CommentController::class, 'index'])}}"><h3 class="font-weight-light">Comments</h3></a></div></div>
    <div class="p-2  col-md-4 col-sm-12"><div class="card p-2"><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'])}}"><h3 class="font-weight-light">Watchlists</h3></a></div></div>
</div>
@endsection