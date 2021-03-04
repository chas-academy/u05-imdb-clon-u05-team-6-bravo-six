@extends('layouts.admin')
@section('content')
    <h2>Add titles to <a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'show'], ['watchlist' => $watchlist->id])}}">{{$watchlist->name}}</a></h2>
    <form method="GET" action="{{route('watchlists.addItems', ['watchlist' => $watchlist->id])}}">
    <label>Search here</label><input type="search" name="query">
    <button type="submit">Submit</button>
    </form>
    <form method="POST" action="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'addTitles'], ['watchlist' => $watchlist->id])}}">
        @csrf
        @method('PUT')
        @if($titles)
        @foreach($titles as $title)
            <div class="form-check">
                @if($old->where('title_id', $title->id)->count() !== 0)
                    <input class="form-check-input" id="{{$title->id}}" type="checkbox" name="{{$title->id}}" checked>
                @else 
                    <input  class="form-check-input" id="{{$title->id}}" type="checkbox" name="{{$title->id}}">
                @endif
                <label class="form-check-label" for="{{$title->id}}">{{$title->title}}</label>
            </div>
        @endforeach
        <button class="btn btn-lg btn-secondary" type="submit">Submit changes</button>
        {{$titles->appends(['query' => $_GET['query']])->links()}}
           @endif
    </form>
@endsection