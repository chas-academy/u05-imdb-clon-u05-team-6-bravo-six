@extends('layouts.app')
@section('content')

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
</div>

<!-- New movies column -->
<section class="new-movies-container row">

    <div class="col-md-4 col-sm-12 p-0">
      <div class="card border border-secondary m-1">
        <img src="https://via.placeholder.com/370x180" class="card-img-top" alt="">
        <div class="card-body">
          <h2>Movie Title</h2>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <p>Last updated...</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-12 p-0">
      <div class="card border border-secondary m-1">
        <img src="https://via.placeholder.com/370x180" class="card-img-top" alt="">
        <div class="card-body">
          <h2>Movie Title</h2>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <p>Last updated...</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-12 p-0">
      <div class="card border border-secondary m-1">
        <img src="https://via.placeholder.com/370x180" class="card-img-top" alt="">
        <div class="card-body">
          <h2>Movie Title</h2>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <p>Last updated...</p>
        </div>
      </div>
    </div>

</section>

<!-- recommended movies column -->

<div class="card-group row">

  <div class="col-sm-3 p-0">
    <div class="card m-1">
      <img src="https://picsum.photos/200" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">Movie nr.1</h5>
        <p class="card-text">Lorem ipsum dolor sit amet.</p>
      </div>
    </div>
  </div>

  <div class="col-sm-3 p-0">
    <div class="card m-1">
      <img src="https://picsum.photos/200" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">Movie nr.1</h5>
        <p class="card-text">Lorem ipsum dolor sit amet.</p>
      </div>
    </div>
  </div>

  <div class="col-sm-3 p-0">
    <div class="card m-1">
      <img src="https://picsum.photos/200" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">Movie nr.1</h5>
        <p class="card-text">Lorem ipsum dolor sit amet.</p>
      </div>
    </div>
  </div>

 <!-- review card -->
  <div class="col-sm p-0">
    <section class="card reviewcard m-1">
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
    </section>
  </div>


</div>
@endsection
