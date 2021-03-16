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
      <img class="d-block w-100" src="http://placeimg.com/1000/360/any" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://placebeard.it/1000/360" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.fillmurray.com/1000/360" alt="Third slide">
    </div>
  </div>
<!-- New movies column -->
<div class="new-movies-container row">
    <div class="movie border border-secondary col-md-4 col-sm-12">
        {{-- <div class="img-box "> --}}
            <img class="img-fluid" src="https://via.placeholder.com/370x180" alt="">
        {{-- </div> --}}
        <div class="description p-2">
            <h2>Movie Title</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia quidem pariatur voluptates perspiciatis vel quod, debitis quo distinctio culpa tenetur.</p>
            <p>Last updated...</p>
        </div>
    </div>
    <div class="movie border border-secondary col-md-4 col-sm-12">
        {{-- <div class="img-box"> --}}
            <img class="img-fluid" src="https://via.placeholder.com/370x180" alt="">
        {{-- </div> --}}
        <div class="description p-2">
            <h2>Movie Two</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia quidem pariatur voluptates perspiciatis vel quod, debitis quo distinctio culpa tenetur.</p>
            <p>Last updated...</p>
        </div>
    </div>
    <div class="movie border border-secondary col-md-4 col-sm-12">
        {{-- <div class="img-box"> --}}
            <img class="img-fluid" src="https://via.placeholder.com/370x180" alt="">
        {{-- </div> --}}
        <div class="description p-2">
            <h2>Movie Three</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia quidem pariatur voluptates perspiciatis vel quod, debitis quo distinctio culpa tenetur.</p>
            <p>Last updated...</p>
        </div>
    </div>
</div >
<!-- recommended movies column -->
<div class="card-group">
  <div class="card">
    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Movie nr.1</h5>
      <p class="card-text">Lorem ipsum dolor sit amet.</p>
    </div>
  </div>
  <div class="card">
    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Movie nr.2</h5>
      <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut cumque tempore animi veniam odio laboriosam?</p>
    </div>
    </div>
    <div class="card">
    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Movie nr.3</h5>
      <p class="card-text">Lorem ipsum dolor sit amet.</p>
    </div>
 </div>
 <!-- review card -->
 <div class="card reviewcard" style="width: 18em;">
        <div class="card-header">
            Top Reviews
        </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Review #1</li>
                <li class="list-group-item">Review #2</li>
                <li class="list-group-item">Review #3</li>
                <li class="list-group-item">Review #4</li>
                <li class="list-group-item">Review #5</li>
                <li class="list-group-item">Review #6</li>
               
            </ul>
    </div>
</div> 
@endsection