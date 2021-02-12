@extends('welcome')
@section('content')
<div class="container">
@foreach ($genres as $genre)
    <p>{{$genre->name}}</p>
@endforeach
</div>
@endsection