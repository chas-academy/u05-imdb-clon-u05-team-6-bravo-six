@extends('layouts.app')

@section('content')
{{-- <ul> --}}
    <h1 class="border-bottom">{{$watchlist->name}}</h1>
    <h4 class="text-mutet">By: {{\App\Models\User::find($watchlist->user_id)->name}}</h4>
    
    @foreach ($watchlistItems as $item)
    <?php
$title = $item->title();
$deletable = Auth::id() === $watchlist->user_id;
    ?>
<x-title-card :title="$title" :watchlists="null" :moddable="false"></x-title-card>
@if ($deletable)
<a class="btn btn-primary btn-sm float-right" href="/search">Add more movies</a>
<form method="POST" action="{{action([\App\Http\Controllers\WatchlistItemController::class, 'destroy'], ['watchlistItem' => $item->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Delete from list</button>
</form>
@endif
    @endforeach

@endsection