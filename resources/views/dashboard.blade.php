@extends('layouts.app')
@section('content')
            <div class="container">
                <h1 class="text-center">Welcome {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} </h1>
                <div class="row">
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12" >
                    <h3 class="text-center">Recent activity:</h3>
                    @foreach ($sortedData as $data)
                    <li>
                        @if ($data->getTable() === "reviews")
                        <a href="{{action([\App\Http\Controllers\ReviewController::class, 'show'], ["review" => $data->id])}}">
                            {{$data->title}}
                        </a>
                        <br/>
                        <small class="text-muted">
                            {{$data->updated_at}}
                        </small>
                        @else
                        <a href="{{action([\App\Http\Controllers\ReviewController::class, 'show'], ["review" => $data->review_id])}}">
                            {{$data->body}}
                        </a>
                        <br/>
                        <small class="text-muted">
                            {{$data->updated_at}}
                        </small>
                        @endif
                    </li>
                    @endforeach
                    </div>
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <h3 class="text-center">Your Reviews:</h3>
                        @foreach ($reviews as $review)
                            <div class="card">
                                <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$review->title_id])}}">
                                    <b>{{ $review->title()->title }}</b>
                                </a>
                                <a href="{{action([App\Http\Controllers\ReviewController::class, 'show'], ["review"=>$review->id])}}">
                                    {{$review->body}}
                                </a>
                                <div>
                                @for($i=0; $i < $review->rating; $i++)
                                    <img class="float-left" style="width: 10%; margin-right: 2%"src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/dbe21d7e-5f33-4784-9f21-218c9a3b9b8a/d74335n-ed3a5286-29c7-4ac4-901c-4c226eca5d43.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvZGJlMjFkN2UtNWYzMy00Nzg0LTlmMjEtMjE4YzlhM2I5YjhhXC9kNzQzMzVuLWVkM2E1Mjg2LTI5YzctNGFjNC05MDFjLTRjMjI2ZWNhNWQ0My5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.DSmPWj593mwpaUhvhevqkQ4Gw1tuaM8QREKj613031I"/>
                                @endfor
                                </div>
                                <small class="text-muted">
                                    {{$review->created_at}}
                                </small>
                            </div>
                        <br/>
                        @endforeach
                    </div>
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <h3 class="text-center">Your comments:</h3>
                        @foreach ($comments as $comment)
                        <div class="card">
                            <a href="{{action([App\Http\Controllers\ReviewController::class, 'show'], ["review"=>$comment->review_id])}}">
                                {{$comment->body}}
                            </a>
                            <small class="text-muted">
                                {{$comment->created_at}}
                            </small>
                        </div>
                        <br/>
                        @endforeach
                    </div>
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <h3 class="text-center">Your watchlists:</h3>
                    @foreach ($watchlists as $watchlist)
                    <div class="card">
                        <a href="{{action([App\Http\Controllers\WatchlistController::class, 'show'], ["watchlist"=>$watchlist->id])}}">{{$watchlist->name}}</a>
                        <small class="text-muted">
                            {{$watchlist->created_at}}
                        </small>
                    </div>
                    <br/>
                    @endforeach
                    </div>
                </div>
            </div>
            @endsection


