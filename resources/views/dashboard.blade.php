@extends('layouts.app')
@section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <h1 class="text-center mr-3">Welcome</h1>  

                    <h1 class="ml-1">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</h1>
                </div>
                <hr/>
                <div class="d-flex flex-row flex-wrap">
                    
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <h3 class="text-center">Your watchlists:</h3>
                    <div class= "jumbotron d-flex flex-row justify-content-evenly flex-wrap">
                        
                        @foreach ($watchlists as $watchlist)
                        <div class="card text-center col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="card-body"> 
                            <a href="{{action([App\Http\Controllers\WatchlistController::class, 'show'], ["watchlist"=>$watchlist->id])}}">
                                {{strlen($watchlist->name)>20 ? substr($watchlist->name,0,17) . "...": $watchlist->name}}
                                
                            </a>
                            <br/>
                            <small class="text-muted">
                                {{$watchlist->created_at}}
                            </small>
                        </div>
                        </div>
                        
                        @endforeach
                        <hr/>
                        <form class="w-100 mt-3" action="{{action([\App\Http\Controllers\WatchlistController::class, 'store'])}}" method="POST">
                            @csrf
                            <div class="col-lg-12 col-xl-12 m-0 d-flex row form-group ">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <div class="form-row col-md-8 col-sm-12">
                                    <p class="col-sm-4 col-xs-12 align-middle mt-1">New watchlist</p>
                                    <input class="form-control col-sm-8 col-xs-12" placeholder="watchlist name"type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-row col-md-4 col-sm-12 text-center">
                                    <div class="col-xl-6 form-check mt-1">
                                        <input class="form-check-input" type="checkbox" class="form-control" name="public">
                                        <label class="form-check-label"  for="name">Public</label>
                                    </div>
                                    
                                    
                                    <button class="btn btn-primary col-xl-6" type="Submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="d-flex flex-row justify-content-around flex-wrap" >
                        
                        
                            <div class= "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                
                                @if(count($reviews))
                                <h3 class="text-center">Your reviews:</h3>
                                @endif
                                <hr/>
                            @foreach ($reviews as $review)
                                <div class="card">
                                    <div class="card-body">
                                    <a class="card-title" href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$review->title_id])}}">
                                        <b>{{ $review->title()->title }}</b>
                                    </a>
                                    
                                    <br/>
                                    <a class="card-text" href="{{action([App\Http\Controllers\ReviewController::class, 'show'], ["review"=>$review->id])}}">
                                        
                                        {{strlen($review->body)>100 ? substr($review->body,0,100) . "...": $review->body}}
                                    </a>
                                    <div class="mt-1">
                                    @for($i=0; $i < $review->rating; $i++)
                                        <img class="float-right" style="width: 5%; margin-right: 2%"src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/dbe21d7e-5f33-4784-9f21-218c9a3b9b8a/d74335n-ed3a5286-29c7-4ac4-901c-4c226eca5d43.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvZGJlMjFkN2UtNWYzMy00Nzg0LTlmMjEtMjE4YzlhM2I5YjhhXC9kNzQzMzVuLWVkM2E1Mjg2LTI5YzctNGFjNC05MDFjLTRjMjI2ZWNhNWQ0My5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.DSmPWj593mwpaUhvhevqkQ4Gw1tuaM8QREKj613031I"/>
                                    @endfor
                                    
                                    <small class="text-muted float-left">
                                        {{$review->created_at}}
                                    </small>
                                </div>
                                </div>
                                </div>
                            <br/>
                            @endforeach
                        </div>
    
                        <div class= "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            @if(count($comments))
                            <h3 class="text-center ">Your comments:</h3>
                            @endif
                            <hr/>
                            @foreach ($comments as $comment)
                            <div class="card">
                                <div class="card-body">
                                <a class="card-text" href="{{action([App\Http\Controllers\ReviewController::class, 'show'], ["review"=>$comment->review_id])}}">
                                    
                                    {{strlen($comment->body)>100 ? substr($comment->body,0,100) . "...": $comment->body}}
                                </a>
                                <br/>
                                <small class="text-muted">
                                    {{$comment->created_at}}
                                </small>
                            </div>
                        </div>
                            <br/>
                            @endforeach
                        </div>
                        
                    </div>
                    </div>
                    
                    <aside class= "col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        @if(count($sortedData))
                        <h3 class="text-center">Recent activity:</h3>
                        @else
                        <h3 class="text-center">No recent activity!</h3>
                        @endif
                    <div class="d-flex flex-row justify-content-evenly flex-wrap">
                    @foreach ($sortedData as $data)
                    <div class="card col-xl-12 col-lg-12 col-md-6 col-sm-12 mb-2">
                        <div class="card-body">
                        @if ($data->getTable() === "reviews")
                        
                        <p class="card-title"><b>Reviewed Movie:
                            <a href="{{action([\App\Http\Controllers\TitleController::class, 'show'], ["title" => $data->title_id])}}">
                                {{$data->title()->title}}
                            </a>
                        </b></p>
                        
                        <p class="card-text">Review title: <br/>
                        <a href="{{action([\App\Http\Controllers\ReviewController::class, 'show'], ["review" => $data->id])}}">
                            {{$data->title}}
                        </a>
                    </p>
                        <small class="text-muted">
                            {{$data->updated_at}}
                        </small>
                        @else
                        <p class="card-text"><b>Commented review:
                            <a href="{{action([\App\Http\Controllers\ReviewController::class, 'show'], ["review" => $data->review()->id])}}">
                                {{$data->review()->title}}
                            </a>
                        </b></p>
                        <p class="card-text">
                        <a href="{{action([\App\Http\Controllers\ReviewController::class, 'show'], ["review" => $data->review_id])}}">
                            {{strlen($data->body)>50 ? substr($data->body,0,50) . "...": $data->body}}
                        </a>
                    </p>
                        <small class="text-muted">
                            {{$data->updated_at}}
                        </small>
                        @endif
                    </div>
                    </div>
                    @endforeach
                    </div>
                </aside>
                
                    <br/>
                    
            </div>
            </div>
            @endsection


