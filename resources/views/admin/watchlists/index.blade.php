@extends('layouts.admin')
@section('content')

<table>
<thead>
    <tr>
        <th><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'], ['sort' => 'id'])}}">Id</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'], ['sort' => 'name'])}}">Name</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'], ['sort' => 'user_id'])}}">User ID</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'], ['sort' => 'created_at'])}}">Created</a></th>
        
    </tr>
</thead>
<tbody>
@foreach ($watchlists as $list)
<tr>
    <td>{{$list->id}}</td>
    <td>{{$list->name}}</td>
    <td>{{$list->user_id}}</td>
    <td>{{$list->created_at}}</td>
    <td><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'show'], ['watchlist' => $list->id])}}">View</a></td>

</tr>
@endforeach

</tbody>
</table>
<div class="container">{{$watchlists->appends(['sort' => $sort])->links()}}</div>
@endsection