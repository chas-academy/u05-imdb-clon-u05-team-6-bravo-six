@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Watchlists</h1>
    <p>Find used-submitted watchlists here!</p>
    @if (Auth::check())
                <form class="col-lg-9 col-xl-9 card px-2" action="{{action([\App\Http\Controllers\WatchlistController::class, 'store'])}}" method="POST">
                @csrf
                 <h2>Add a new watchlist</h2>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="name">Watchlist name</label>
                        <input class="form-control" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" class="form-control" name="public">
                        <label class="form-check-label"  for="name">Public</label>
                        <button class="btn btn-primary" type="Submit">Submit</button>
                    </div>
                    </form>
    @endif
<table>
<thead>
    <tr>
        <th><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'], ['sort' => 'id'])}}">Id</a></th>
        <th><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'], ['sort' => 'name'])}}">Name</a></th>
        <th><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'], ['sort' => 'user_id'])}}">User</a></th>
        <th><a href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'], ['sort' => 'created_at'])}}">Created</a></th>
        {{-- <th>Public</th> --}}
        <th>No. of items</th>
    </tr>
</thead>
<tbody>
@foreach ($watchlists as $list)
@if($list->public || $list->user_id === Auth::id())
<tr>
    <td>{{$list->id}}</td>
    <td>{{$list->name}}</td>
    <td>{{\App\Models\User::find($list->user_id)->name}}</td>
    <td>{{$list->created_at}}</td>
    {{-- <td>{{$list->public? "True" : "False"}}</td> --}}
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