@extends('layouts.app')

@section('content')
{{-- <ul> --}}
    <h1>{{$watchlist->name}}</h1>
    <h4 class="text-mutet">By: {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</h4>
    @foreach ($watchlistItems as $item)
        <div class="card">
            <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ['title'=>$item->title_id])}}">
                {{$item->title()->title}} 
            </a>
        </div>
    @endforeach

@endsection