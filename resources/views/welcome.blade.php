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
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleSlides" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleSlides" data-slide-to="1"></li>
    <li data-target="#carouselExampleSlides" data-slide-to="2"></li>
  </ol>
    <div class="carousel-inner">
      @foreach($randomMovies as $number => $movie)
    <div class="carousel-item 
    @if($number === 0)
    active
    @endif
    ">
    <a class="img-carousel-wrapper" href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ['title' => $movie->id])}}">
      <img class="img-fluid"  src="{{$movie->img_url}}" alt="First slide"></a>
    </div>
    @endforeach
  </div>
</div>
<!-- New movies column -->
<div class="container">
<h2>Recently updated movies</h2>
<div class="new-movies-container row">
    @foreach ($recentMovies as $movie)
    <div class="movie border border-secondary col-md-4 col-sm-12">
        {{-- <div class="img-box "> --}}
            <a class="text-center d-block" href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ['title' => $movie->id])}}">
            <img class="img-fluid" src="{{$movie->img_url}}" alt=""></a>
        {{-- </div> --}}
        <div class="description p-2">
            <a href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ['title' => $movie->id])}}">
                <h2>{{$movie->title}}</h2>
            </a>
            <p> Updated at: {{$movie->description}}</p>
            <p>Updated at: {{$movie->updated_at}}</p>
        </div>
    </div>
    @endforeach
</div >
<!-- recommended movies column -->
<div class="card-group row">
  <div class="card">
    <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov1->id])}}">
    <img src="
    @if ($mov1->img_url !== null)
    {{$mov1->img_url}}
    @else
    https://picsum.photos/200
    @endif
    " class="card-img-top" alt="..."/></a>
    <div class="card-body">
        <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov1->id])}}">
            <h5 class="card-title">{{$mov1->title}}</h5>
        </a>
      <p class="card-text">Average rating: {{round($mov1->avgRating(), 2)}} / 5</p>
    </div>
  </div>
  <div class="card">
      <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov2->id])}}">
    <img src="
    @if ($mov2->img_url !== null)
    {{$mov2->img_url}}
    @else
    https://picsum.photos/200
    @endif
    " class="card-img-top" alt="..."/></a>
    <div class="card-body">
        <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov2->id])}}">
            <h5 class="card-title">{{$mov2->title}}</h5>
        </a>
      <p class="card-text">Average rating: {{round($mov2->avgRating(), 2)}} / 5</p>
    </div>
  </div>
  <div class="card">
     <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov3->id])}}"><img src="
    @if ($mov3->img_url !== null)
    {{$mov3->img_url}}
    @else
    https://picsum.photos/200
    @endif
    " class="card-img-top" alt="..."/></a>
    <div class="card-body">
        <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov3->id])}}">
            <h5 class="card-title">{{$mov3->title}}</h5>
        </a>
      <p class="card-text">Average rating: {{round($mov3->avgRating(), 2)}} / 5</p>
    </div>
  </div>
 <!-- review card -->
 <div class="card reviewcard" style="width: 18em;">
        <div class="card-header">
            Most popular reviews
        </div>
            <ul class="list-group list-group-flush">
                @foreach ($topReviews as $review)
                <li class="list-group-item">
                    <a href="{{action([App\Http\Controllers\ReviewController::class, 'show'], ["review"=>$review->id])}}">
                        {{$review->title}}
                    </a>
                    <br>
                    <small class="text-muted">
                        {{strlen($review->body)>35 ? substr($review->body,0,34) . "...": $review->body}}
                    </small>
                    <br>
                    <small>
                        With {{$review->comments_query_count}} comments.
                    </small>
                    <small class="text-muted content-end">
                         By:  {{$review->user()->name}}
                    </small>
                </li>
                @endforeach
            </ul>
    </div>
</div> 
</div>
</div>
@endsection