@extends('layouts.admin')
@section('content')
    <h2>Add titles to <a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'show'], ['watchlist' => $watchlist->id])}}">{{$watchlist->name}}</a></h2>
    <form method="GET" action="{{route('watchlists.addItems', ['watchlist' => $watchlist->id])}}">
    <div class="row"><input placeholder="Search here" class="form-control col-md-4" type="search" name="query"><button aria-label="Search but in a cool way cus germany" type="submit" class="btn btn-primary btn-sm">Sëarch</button></div>
    
    </form>
    @if($titles)
      <ul>
      @foreach($titles as $title)
        <li class="row">
          <div class="col-lg-3"><a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'show'], ['title' => $title->id])}}" target="_blank">{{$title->title}}</a></div>
          @if($old->where('title_id', $title->id)->count() === 0)
            <form method="POST" action="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'addWatchlistItem'], ['watchlist' => $watchlist->id])}}">
              @csrf
              <input type="hidden" name="title_id" value="{{$title->id}}">
              <button type="submit" class="btn btn-info btn-sm">Add to watchlist</button>
            </form>
          @else 
            <div class="col-lg-3"><button type="submit" disabled class="btn btn-sm btn-secondary">Added!</button></div>
          @endif
        </li>
      @endforeach
      </ul>
      {{$titles->appends(['query' => $_GET['query']])->links()}}
    @endif
@endsection