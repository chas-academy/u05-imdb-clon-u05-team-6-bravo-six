@extends('layouts.admin')
@section('content')

<table>
<thead>
    <tr>
        <th></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'index'], ['sort' => 'id'])}}">Id</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'index'], ['sort' => 'name'])}}">Name</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'index'], ['sort' => 'email'])}}">Email</a></th>
        <th><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'index'], ['sort' => 'created_at'])}}">Member since</a></th>
        <th></th>
        <th></th>
    </tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
    <td>@if ($user->img_url !== null)
        <img src="{{ asset('storage/' . $user->img_url) }}" alt="No photo" class="img-thumbnail border border-primary rounded-circle" style="max-width: 40px;">
        @else
        <img src="https://crestedcranesolutions.com/wp-content/uploads/2013/07/facebook-profile-picture-no-pic-avatar.jpg" alt="No profile picture" class="img-thumbnail border border-primary rounded-circle" style="max-width: 40px;">
        @endif</td>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->created_at}}</td>
    <td><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'show'], ['user' => $user->id])}}">View</a></td>
</tr>
@endforeach

</tbody>
</table>
<div class="container">{{$users->appends(['sort' => $sort])->links()}}</div>
@endsection