@extends('layouts.admin')
@section('content')

<table>
<thead>
    <tr>
        <th><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'], ['sort' => 'id'])}}">Id</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'], ['sort' => 'name'])}}">Name</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'index'], ['sort' => 'created_at'])}}">Created</a></th>
        <th></th>
        <th></th>
    </tr>
</thead>
<tbody>
@foreach ($watchlists as $list)
<tr>
    <td>{{$list->id}}</td>
    <td>{{$list->name}}</td>
    <td>{{$list->created_at}}</td>
    {{-- <td><a href="{{action([\App\Http\Controllers\Admin\WatchlistController::class, 'show'], ['user' => $user->id])}}">View</a></td> --}}

</tr>
@endforeach

</tbody>
</table>
<div class="container">{{$watchlists->appends(['sort' => $sort])->links()}}</div>
@endsection