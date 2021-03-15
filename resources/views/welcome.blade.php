@extends('layouts.app')
@section('content')

<!-- Dropdown menu -->
<div class="container">
  <nav class="navbar navbar navbar-dark bg-dark">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{action([App\Http\Controllers\TitleController::class, 'index'])}}">Titles</a>
                <a class="dropdown-item" href="{{action([App\Http\Controllers\GenreController::class, 'index'])}}">Genres</a>
                <a class="dropdown-item" href="{{action([App\Http\Controllers\WatchlistController::class, 'index'])}}">Watchlists</a>
                <a class="dropdown-item" href=" {{action([App\Http\Controllers\WatchlistItemController::class, 'index'])}} ">Watchlists items</a>
                <a class="dropdown-item" href="{{action([App\Http\Controllers\ReviewController::class, 'index'])}}">Reviews</a>
                <a class="dropdown-item" href="{{action([App\Http\Controllers\CommentController::class, 'index'])}}">Comments</a>
            </div>
        </div>

 <!-- Search Widget -->
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
 <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <x-image-layout :user="Auth::user()"></x-image-layout>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
</div>

<!-- slider -->
<div id="carouselExampleSlides" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://via.placeholder.com/800x250" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://via.placeholder.com/800x250" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://via.placeholder.com/800x250" alt="Third slide">
    </div>
  </div>
</div>
<div class="justify-content-space-between">
    <div class="btn-group leftBtn d-flex justify-content-start" role="group" > 
        <li class="leftBtn"><a href="{{action([App\Http\Controllers\TitleController::class, 'index'])}}">Titles</a></li>
        <li class="leftBtn"><a href="{{action([App\Http\Controllers\GenreController::class, 'index'])}}">Genres</a></li>
    </div>
    <div class="btn-group rightBtn d-flex justify-content-end" role="group" >
        <li class="rightBtn"><a href="{{action([App\Http\Controllers\TitleController::class, 'index'])}}">Titles</a></li>
        <li class="rightBtn"><a href="{{action([App\Http\Controllers\GenreController::class, 'index'])}}">Genres</a></li>
    </div>
</div>
@endsection