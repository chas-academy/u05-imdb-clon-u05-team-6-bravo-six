@extends('layouts.app')
@section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <h1 class="text-center mr-3">Welcome </h1>  
                    <x-image-layout :user="Auth::user()"></x-image-layout>
                    <h1 class="ml-3"> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} </h1>
                </div>
                <hr/>
                <h3 class="text-center">Your watchlists:</h3>
                    <div class="jumbotron">
                    
                    <div class= "d-flex flex-row justify-content-evenly flex-wrap">
                        
                        @foreach ($watchlists as $watchlist)
                        <div class="card text-center col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <a href="{{action([App\Http\Controllers\WatchlistController::class, 'show'], ["watchlist"=>$watchlist->id])}}">{{$watchlist->name}}</a>
                            <small class="text-muted">
                                {{$watchlist->created_at}}
                            </small>
                        </div>
                        
                        @endforeach
                        </div>
                    </div>
                    <h3 class="text-center">Recent activity:</h3>
                    <div class= "col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <hr/>
                    <div class="d-flex flex-row justify-content-evenly flex-wrap">
                    @foreach ($sortedData as $data)
                    <div class="card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        @if ($data->getTable() === "reviews")
                        <p><b>Review Movie titled:
                            <a href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ["title" => $data->title_id])}}">
                                {{$data->title()->title}}
                            </a>
                        </b></p>
                        <p>Review title:
                        <a href="{{action([\App\Http\Controllers\ReviewController::class, 'show'], ["review" => $data->id])}}">
                            {{$data->title}}
                        </a>
                    </p>
                        <small class="text-muted">
                            {{$data->updated_at}}
                        </small>
                        @else
                        <p><b>Commented review on:
                            <a href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ["title" => $data->review()->title_id])}}">
                                {{$data->review()->title()->title}}
                            </a>
                        </b></p>
                        
                        <a href="{{action([\App\Http\Controllers\ReviewController::class, 'show'], ["review" => $data->review_id])}}">
                            {{strlen($data->body)>50 ? substr($data->body,0,50) . "...": $data->body}}
                        </a>
                        
                        <small class="text-muted">
                            {{$data->updated_at}}
                        </small>
                        @endif
                    </div>
                    @endforeach
                    </div>
                    </div>
                    <br/>
                    <div class="d-flex flex-row justify-content-around flex-wrap">
                        
                        
                        <div class= "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <h3 class="text-center">Your reviews:</h3>
                            <hr/>
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
                                    <img class="float-left" style="width: 5%; margin-right: 2%"src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/dbe21d7e-5f33-4784-9f21-218c9a3b9b8a/d74335n-ed3a5286-29c7-4ac4-901c-4c226eca5d43.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvZGJlMjFkN2UtNWYzMy00Nzg0LTlmMjEtMjE4YzlhM2I5YjhhXC9kNzQzMzVuLWVkM2E1Mjg2LTI5YzctNGFjNC05MDFjLTRjMjI2ZWNhNWQ0My5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.DSmPWj593mwpaUhvhevqkQ4Gw1tuaM8QREKj613031I"/>
                                @endfor
                                </div>
                                <small class="text-muted">
                                    {{$review->created_at}}
                                </small>
                            </div>
                        <br/>
                        @endforeach
                    </div>
                    <div class= "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <h3 class="text-center ">Your comments:</h3>
                        <hr/>
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
                    
                </div>
            </div>
            @endsection


