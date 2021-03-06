@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Watchlists</h1>
    <p>Find user-submitted watchlists here!</p>
    <!-- Search Widget -->
    <div class="navbar-nav ml-auto justify-content-end mb-3">
        <form class="form-inline my-2 my-lg-0" action="{{route('watchlists.search')}}" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control mr-sm-2" placeholder="Search for..." name="q">
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
            </div>
        </form>
    </div>
    @if (Auth::check())
        <form class="col-lg-9 col-xl-9 card px-2 mb-3" action="{{action([\App\Http\Controllers\WatchlistController::class, 'store'])}}" method="POST">
            @csrf
            <h2 class="mt-2">Add a new watchlist</h2>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group">
                <label for="name">Watchlist name</label>
                <input class="form-control" type="text" class="form-control" name="name" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" class="form-control" name="public">
                <label class="form-check-label"  for="name">Public</label>
                <button class="btn btn-primary" type="Submit">Submit</button>
            </div>
        </form>
    @endif
<style>
    @media only screen and (max-width: 600px){
        .hide-on-mobile {
            display: none;
        }
    }
    </style>
    <table class="table table-hover w-100">
        <thead>
            <tr>
                <th class="hide-on-mobile"><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'], ['sort' => 'id'])}}">Id</a></th>
                <th><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'], ['sort' => 'name'])}}">Name</a></th>
                <th><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'], ['sort' => 'user_id'])}}">User</a></th>
                <th class="hide-on-mobile"><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'], ['sort' => 'created_at'])}}">Created</a></th>
                <th>No. of items</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($watchlists as $list)
        @if($list->public || $list->user_id === Auth::id())
        <tr>
            <td class="hide-on-mobile">{{$list->id}}</td>
            <td>{{$list->name}}</td>
            <td>{{\App\Models\User::find($list->user_id)->name}}</td>
            <td class="hide-on-mobile">{{$list->created_at}}</td>
            <td class="text-center">{{$list->watchlistitems()->count()}}</td>
            <td><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'show'], ['watchlist' => $list->id])}}">View</a></td>

        </tr>
        @endif
        @endforeach


        </tbody>
    </table>

    <div class="container">{{$watchlists->appends(['sort' => $sort])->links()}}</div>
</div>

@endsection