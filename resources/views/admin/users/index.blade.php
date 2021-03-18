@extends('layouts.admin')
@section('content')
<a class="btn btn-primary" href="{{action([\App\Http\Controllers\Admin\UserController::class, 'create'])}}">Create new user</a>
<table>
<thead>
    <tr>
        <th><a href="{{action([\App\Http\Controllers\Admin\UserController::class, 'index'], ['sort' => 'id'])}}">Id</a></th>
        <th></th>
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
    <td>{{$user->id}}</td>
    <td><x-image-layout :user="$user"></x-image-layout></td>
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