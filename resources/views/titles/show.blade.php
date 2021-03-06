@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <img class="col-xl-3 col-lg-3 col-sm-6 col-xs-6" src="
@if($title->img_url !== null)
{{  $title->img_url}}
@else
https://i.pinimg.com/564x/2b/55/06/2b55061c90ebcda12a3aedbbb00bbaf5.jpg
@endif
    "/>
    <div class="col-lg-9 col-xl-9 mt-xl-5 col-sm-6 col-xs-6">
        <h1>{{$title->title}}</h1>
        <span class="row"><a class="mr-2 px-1 card" href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $title->genre()->id])}}">{{$title->genre()->name}}</a></span>
        <ul class="list-unstyled row">
            @foreach($title->genres()->get() as $genre)
                <li><a class="text-muted mr-2 px-1 card" href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a></li>
            @endforeach
        </ul>
        
        @auth
        <div class="dropdown col-md-3 float-right">
            <?php 
                $watchlists = Auth::user()->watchlists();
                ?>
               @auth
               <button class="btn btn-secondary dropdown-toggle fas fa-plus" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="list-unstyled">
                         @foreach ($watchlists as $watchlist)

                              <li class="watchlist_listitem
                              @if($watchlist->watchlistItems()->contains('title_id', $title->id))
                                   added
                              @endif
                              " data-id="{{$watchlist->id}}" data-title="{{$title->id}}">{{$watchlist->name}}<span><i class="
                                   @if($watchlist->watchlistItems()->contains('title_id', $title->id))
                                   fas fa-check
                                   @endif
                                   "></i></span></li>
                              @endforeach
                              <li><a href="{{route('dashboard')}}">Add watchlist</a></li>
                              </ul>
                         </div>
                    @endauth
               </div>
               @endauth
        <hr/>
        <p class="text-muted">{{$title->description}}</p>
    </div>


    <div class="col-lg-3 col-xl-3"></div>
    
    <form class="col-lg-9 col-xl-9 mb-3" action="{{action([\App\Http\Controllers\ReviewController::class, 'store'])}}" method="POST">
        <h2>Post a review!</h2>
                @csrf
                <input type="hidden" name="title_id" value="{{$title->id}}">
                @if (Auth::check())
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="rating">Choose a rating</label>
                        <select class="form-control" id="rating" name="rating"  required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" placeholder="Title" name="title" id="title" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Write your review here</label>
                        <textarea class="form-control" name="body" id="body" required></textarea>
                    </div>
                        <button class="btn btn-primary" type="Submit">Submit</button>
                </div>
            </div>
    </form>
    @else
    <p>You need to <a href="{{route('login')}}">log in</a> to make a review!</p>
    @endif

    @foreach ($reviews as $review)
    <div class="container row">
            <div class="col-3 ">
                @for($i=0; $i < $review->rating; $i++)
                    <img class="float-right" style="width: 15%; margin-right: 2%"src="
                    https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/dbe21d7e-5f33-4784-9f21-218c9a3b9b8a/d74335n-ed3a5286-29c7-4ac4-901c-4c226eca5d43.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvZGJlMjFkN2UtNWYzMy00Nzg0LTlmMjEtMjE4YzlhM2I5YjhhXC9kNzQzMzVuLWVkM2E1Mjg2LTI5YzctNGFjNC05MDFjLTRjMjI2ZWNhNWQ0My5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.DSmPWj593mwpaUhvhevqkQ4Gw1tuaM8QREKj613031I"/>
                @endfor
            </div>
            <div class="card col-9 col-xs-12">
                <h3><a class="float-left" href=" {{action([App\Http\Controllers\ReviewController::class, 'show'], ['review' => $review->id])}} ">{{$review->title}}</a>
                    <small class="text-muted float-right">{{$review->user()->name}}</small>
                </h3>
            <span>{{strlen($review->body) > 50 ? substr($review->body,0,50)."...": $review->body}}</span>
            </div>
        <br/>
        </div>
    @endforeach
</div>
@endsection