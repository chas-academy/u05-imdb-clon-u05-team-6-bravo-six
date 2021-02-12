@extends('layouts.app')
@section('content')

    
@foreach ($genres as $genre)
    <p>{{$genre->name}}</p>
@endforeach

@endsection