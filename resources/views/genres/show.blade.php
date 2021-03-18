@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
<a class="breadcrumb-item" href="{{action([\App\Http\Controllers\GenreController::class, 'index'])}}">Genres</a>
<a class="breadcrumb-item active" href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a>
    </ol>
</nav>
    <div class="row">
        <div class="col-md-9 col-xs-12">
            @if(request('q'))
            <span>Searching through...</span>
            @endif
            <h1>{{$genre->name}}</h1>
        <div class="navbar-nav ml-auto justify-content-end">
            <form class="form-inline my-2 my-lg-0" action="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $genre->id])}}" method="GET" role="search">
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

        {{-- show genres --}}
        <div class="row">
            <?php $watchlists = Auth::check() ? Auth::user()->watchlists() : null?>
        @foreach($titles as $title)
        <div class="col-12">
            <x-title-card :title="$title" :watchlists="$watchlists" :moddable="true"></x-title-card>
        </div>
            @endforeach
        </div>
        </div>
        <x-navigation-aside :currentPage="$genre->id"></x-navigation-aside>
        @if(!request('q'))
        <div class="container">{{$titles->appends(['q' => request('q')])->links()}}</div>
        @endif
    </div>
@endsection