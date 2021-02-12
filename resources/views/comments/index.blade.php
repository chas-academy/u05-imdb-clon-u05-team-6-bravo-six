@extends('layouts.app')
@section('content')
<ul>
@foreach ($comments as $comment)
    <li>
        <p>{{$comment->body}}</p>
    </li>
@endforeach
</ul>
@endsection