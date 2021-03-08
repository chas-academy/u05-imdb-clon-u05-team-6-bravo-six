@extends('layouts.app')
@section('content')
<form class="col-lg-9 col-xl-9 float-right" action="{{action([\App\Http\Controllers\WatchlistController::class, 'store'])}}" method="POST">
                @csrf
                @if (Auth::check())
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="row">
                    <div class="form-group">
                        <label for="name">Watchlist name</label>
                        <input class="form-control" type="text" class="form-control" name="name" required>
                        <label for="name">is public?</label>
                        <input class="form-control" type="checkbox" class="form-control" name="public">
                        <button class="btn btn-primary" type="Submit">Submit</button>
                    </div>
                </div>
                @endif
            </div>
    </form>
<ul>
@foreach ($watchlists as $watchlist)
@if($watchlist->public)
    <li>{{$watchlist->id}} <br> 
    {{$watchlist->name}}</li>
@endif
@endforeach
</ul>


@endsection