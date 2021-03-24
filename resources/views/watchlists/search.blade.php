@extends('layouts.app')

@section('content')

<div class="navbar-nav ml-auto justify-content-end">
            <form class="form-inline my-2 my-lg-0" action="{{route('watchlists.search')}}" method="GET" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control mr-sm-2" placeholder="Search for..."
                        @if(request('q'))
                        value="{{request('q')}}"
                        @endif
                        name="q">
                        <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
                    </div>
                </form>
            </div>
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Search Result For:
                <small>{{$key}}</small>
            </h1>
            @foreach ($watchlists as $watchlist)
            @if($watchlist->public === 1 || $watchlist->user_id === Auth::id())
            <div class="movie">
                <x-watchlist-card :watchlist="$watchlist" :user="$watchlist->user()"></x-watchlist-card>
            </div>
            @endif
            @endforeach
        </div>
        <x-navigation-aside></x-navigation-aside>
    </div>
@endsection