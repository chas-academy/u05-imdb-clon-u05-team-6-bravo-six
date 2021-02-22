@extends('layouts.app')
@section('content')
            <div class="container">
                <h1 class="text-center">Welcome {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} </h1>
                <div class="row">
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12" >
                    <h3 class="text-center">Recent activity:</h3>
                    @foreach ($sortedData as $data)
                    <li>    
                        <a>{{$data->body}}</a>
                        <br/>
                        <small class="text-muted">
                            {{$data->created_at}}
                        </small>
                    </li>
                    
                    @endforeach
                    </div>
                    
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <h3 class="text-center">Your Reviews:</h3>
                        <br/>
                        
                        @foreach ($reviews as $review)
                            <div class="card">
                                <a><b>{{ $review->title()->title }}</b></a>
                                
                                <a>{{$review->body}} - {{$review->rating}}</a> {{-- Should later serve as link to review --}}
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
                            <a>{{$comment->body}}</a>
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
                        <a>{{$watchlist->name}}</a>
                        <small class="text-muted">
                            {{$data->created_at}}
                        </small>
                    </div>
                    @endforeach
                    </div>
                     
                    
                </div>
            </div> 
            @endsection


