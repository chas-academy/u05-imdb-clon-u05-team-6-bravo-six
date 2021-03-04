@extends('layouts.admin')
@section('content')
<a href=" {{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'])}} ">Go back to watchlists</a>
<form method="POST" action="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'update'], ['watchlist' => $watchlist->id])}}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Id:</label>
        <input class="form-control" name="watchlist" disabled value="{{$watchlist->id}}">
    </div>
    <div class="form-group">
        <label>Name: </label>
        <input class="form-control" name="name" value="{{$watchlist->name}}">
    </div>
    <div class="form-group">
        <label>User ID: </label>
        <input class="form-control" name="user_id" disabled value="{{$watchlist->user_id}}">
    </div>
    
    <ul>
        
    </ul>
    <button class="btn btn-secondary btn-lg" type="submit" value="Update">Save changes</button>
</form>
<br/>
<h3>Contains Titles:</h3>   
@foreach($watchlist->watchlistItems() as $item)
            <p class="col-4">
                <a href="{{action([\App\Http\Controllers\Admin\TitleController::class, 'show'], ['title' => $item->title()->id])}}">
                    {{$item->title()->title}}
                </a> 
                with id {{$item->title()->id}}
            </p>
                <form method="POST" action="{{action([\App\Http\Controllers\Admin\WatchlistItemController::class, 'destroy'], ['watchlistitem' => $item->id])}}">
                    @method("DELETE")
                    @csrf
                    
                    <button class="btn btn-danger btn-sm col-2" type="submit" value="Delete">Delete</button>
                    
                </form>
            
        @endforeach
    <hr/>
    <a href=" {{route('watchlists.addItems', ['watchlist' => $watchlist->id])}} ">Add titles</a>
    <form method="POST" action="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'destroy'], ['watchlist' => $watchlist->id])}}">
        @method("DELETE")
        @csrf
        <td>
            <button class="btn btn-danger btn-lg col-2" type="submit" value="Delete">Delete Watchlist</button>
        </td>
    </form>
@endsection