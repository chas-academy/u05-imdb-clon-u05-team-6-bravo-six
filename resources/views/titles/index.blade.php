@extends('layouts.app')
@section('content')
<?php $watchlists = Auth::check() ? Auth::user()->watchlists() : null?>
<form method="GET" action="{{route('search')}}" class="container" id="filter-titles">
    <div class="row">
        <div class="col">
            <input type="search" class="form-control form-control-lg" name="q" placeholder="Type the name of a movie you wanna search for here!">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary btn-lg">SEARCH <i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
<div class="row">
<aside class="col-md-3 col-sm-12">
    <ul class="list-unstyled">
        @foreach(\App\Models\Genre::all() as $genre)
            <li class="form-check">
                <input form="filter-titles" class="form-check-input" type="checkbox" name="{{$genre->id}}" id="{{$genre->name}}"><label class="form-check-label">{{$genre->name}}</label> 
            </li>
        @endforeach
    </ul>
</aside>
<div class="col-md-9 col-sm-12">
@foreach ($titles as $title)
                <x-title-card :title="$title" :watchlists="$watchlists" :moddable="true"></x-title-card>
@endforeach
</div>
</div>
@endsection