@extends('layouts.app')
@section('content')
            <div class="container">
                <h1 class="text-center">Welcome {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} </h1>
                <div class="row">
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12" >
                    <h3 class="text-center">Recent activity:</h3>
                    <li>Here you</li>
                    <li>will see</li>
                    <li>recent activity</li>
                    <li>hopfully soon</li>
                    </div>
                    
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <h3 class="text-center">Your Reviews:</h3>
                        <br/>
                        {{-- $title = App\Models\Review::find(1); used in attempt to solve problem below --}}
                        @foreach ($reviews as $review)
                            <div>
                            
                                <a>{{ $review->title()->title }}</a>{{-- problem: must return a relationship instance --}}
                                <br/>
                                <a>{{$review->body}} - {{$review->rating}}</a> {{-- Should later serve as link to review --}}
                                
                            </div>
                        @endforeach
                    </div>

                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <h3 class="text-center">Your comments:</h3>
                        @foreach ($comments as $comment)
                            <a>{{$comment->body}}</a>
                        @endforeach
                    </div>

                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <h3 class="text-center">Your watchlists:</h3>
                    @foreach ($watchlists as $watchlist)
                        <a>{{$watchlist->name}}</a>
                    @endforeach
                    </div>
                </div>
            </div> 
            @endsection


