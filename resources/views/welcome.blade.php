@extends('layouts.app')
@section('content')

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


<!-- New movies column -->
<h2>Most recently updated movies</h2>
<section class="new-movies-container row">
 @foreach ($recentMovies as $movie)
    <div class="col-md-4 col-sm-12 p-0">
      <div class="card border border-secondary m-1">
        <a class="d-block m-auto" href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ['title' => $movie->id])}}">
            <img class="img-fluid" src="{{$movie->img_url}}" alt=""></a>
        <div class="card-body">
          <a href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ['title' => $movie->id])}}">
                <h2>{{$movie->title}}</h2>
            </a>
          <p class="card-text">{{$movie->description}}</p>
          <p>Last updated {{$movie->updated_at}}</p>
        </div>
      </div>
    </div>
    @endforeach
  </section>
{{dd($mov1, $mov2, $mov3)}}
<!-- recommended movies column -->
<h2>Highest rated movies right now</h2>
<div class="card-group row">

  <div class="col-sm-3 p-0">
    <div class="card m-1">
      <a href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ['title' => $mov1])}}"><img src="
      
      @if ($mov1->img_url !== null)
    {{$mov1->img_url}}
    @else
    https://picsum.photos/200
    @endif
      
      " class="card-img-top" alt=""></a>
      <div class="card-body">
        <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov1->id])}}">
            <h5 class="card-title">{{$mov1->title}}</h5>
        </a>
      <p class="card-text">Average rating: {{round($mov1->avgRating(), 2)}} / 5</p>
      </div>
    </div>
  </div>

  <div class="col-sm-3 p-0">
    <div class="card m-1">
      <a href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ['title' => $mov2])}}"><img src="
      
    @if ($mov2->img_url !== null)
    {{$mov2->img_url}}
    @else
    https://picsum.photos/200
    @endif
      
      " class="card-img-top" alt=""></a>
      <div class="card-body">
        <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov2->id])}}">
            <h5 class="card-title">{{$mov2->title}}</h5>
        </a>
      <p class="card-text">Average rating: {{round($mov2->avgRating(), 2)}} / 5</p>
      </div>
    </div>
  </div>

  <div class="col-sm-3 p-0">
    <div class="card m-1">
      <a href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ['title' => $mov3])}}">
        <img src="
        @if ($mov3->img_url !== null)
          {{$mov3->img_url}}
        @else
          https://picsum.photos/200
        @endif
      
      " class="card-img-top" alt=""></a>
      <div class="card-body">
         <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$mov3->id])}}">
         <h5 class="card-title">{{$mov3->title}}</h5>
         </a>
         <p class="card-text">Average rating: {{round($mov3->avgRating(), 2)}} / 5</p>
      </div>
    </div>
  </div>

 <!-- review card -->
  <div class="col-sm p-0">
    <section class="card reviewcard m-1">
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
    </section>
  </div>


</div>
@endsection