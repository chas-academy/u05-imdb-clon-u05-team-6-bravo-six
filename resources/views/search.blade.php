@extends('layouts.app')

@section('content')
    <div class="row">
    @foreach (\App\Models\Genre::all() as $genre)
        <button class="btn btn-sm m-1 filter" data-id="{{$genre->id}}">{{$genre->name}}</button>
        
    @endforeach
    </div>
<div class="navbar-nav ml-auto justify-content-end">
            <form class="form-inline my-2 my-lg-0" action="/search" method="GET" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control mr-sm-2" placeholder="Search for..." 
                        @if(request('q'))
                        value="{{request('q')}}"
                        @endif
                        name="q">
                        <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
                    </div>
                </form>
            </div>
@csrf
<?php
$watchlists = Auth::check() ? Auth::user()->watchlists() : null?>
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Search Result For:
                <small>{{$key}}</small>
            </h1>
            @foreach ($titles as $title)
            <div class="@foreach($title->genres()->get() as $genre) {{$genre->id}} @endforeach movie">
                <x-title-card :title="$title" :watchlists="$watchlists" :moddable="true"></x-title-card>
            </div>
                @endforeach
        </div>
        <x-navigation-aside></x-navigation-aside>
        
        
    </div>
@endsection