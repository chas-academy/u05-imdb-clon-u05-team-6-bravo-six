@extends('layouts.app')

@section('content')
    {{-- <div class="row">
        class filter must remain on button for jquery to work
    @foreach (\App\Models\Genre::all() as $genre)
        <button class="btn btn-sm m-1 filter" data-id="{{$genre->id}}">{{$genre->name}}</button>

    @endforeach
    </div> --}}
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
            <div class="movie">
                <x-watchlist-card :watchlist="$watchlist" :user="$watchlist->user()"></x-watchlist-card>
            </div>
            @endforeach
        </div>
        <x-navigation-aside></x-navigation-aside>

        {{-- <div class="row">{{$titles->appends(['q' => request('q')])->links()}}</div> --}}
    </div>
@endsection