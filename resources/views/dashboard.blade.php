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
                            {{$data->body}}
                        </a>
                        @else 
                        
                        <a href="{{action([\App\Http\Controllers\ReviewController::class, 'show'], ["review" => $data->review_id])}}">
                            {{$data->body}}
                        </a>
                        @endif
                    
                    </li>
                    
                    @endforeach
                    </div>
                    
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <h3 class="text-center">Your Reviews:</h3>
                        
                        @foreach ($reviews as $review)
                            <div class="card">
                                
                                <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$review->title_id])}}">
                                    {{ $review->title()->title }}
                                </a>
                                
                                <a href="{{action([App\Http\Controllers\ReviewController::class, 'show'], ["review"=>$review->id])}}">
                                    {{$review->body}} - {{$review->rating}}
                                </a> 
                                <small class="text-muted">
                                    {{$data->created_at}}
                                </small>
                            </div>
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
                                {{$data->created_at}}
                            </small>
                        </div>
                        @endforeach
                    </div>

                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <h3 class="text-center">Your watchlists:</h3>
                    @foreach ($watchlists as $watchlist)
                    <div class="card">
                        <a href="{{action([App\Http\Controllers\WatchlistController::class, 'show'], ["watchlist"=>$watchlist->id])}}">{{$watchlist->name}}</a>
                        <small class="text-muted">
                            {{$data->created_at}}
                        </small>
                    </div>
                    @endforeach
                    </div>
                     
                    
                </div>
            </div> 
            @endsection


