@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
<a class="breadcrumb-item" href="{{action([\App\Http\Controllers\WatchlistController::class, 'index'])}}">Watchlists</a>
<a class="breadcrumb-item active" href="{{action([\App\Http\Controllers\WatchlistController::class, 'show'], ['watchlist' => $watchlist->id])}}">{{$watchlist->name}}</a>
    </ol>
</nav>
    <h1 class="border-bottom">{{$watchlist->name}}<span class="text-mutet">By: {{\App\Models\User::find($watchlist->user_id)->name}}</span></h1>    
    @if($watchlist->public)

    <small class="text-muted float-left">Public</small>

    @else

    <small class="text-muted float-left">Private</small>

    @endif

    

    <?php $deletable = Auth::id() === $watchlist->user_id; ?>
    @foreach ($watchlistItems as $item)
    <?php
$title = $item->title();
    ?>
<x-title-card :title="$title" :watchlists="null" :moddable="false"></x-title-card>
@if ($deletable)

<form method="POST" action="{{action([\App\Http\Controllers\WatchlistItemController::class, 'destroy'], ['watchlistItem' => $item->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Delete from list</button>
</form>
@endif
    @endforeach
<a class="btn btn-primary btn-sm" href="/search">Add more movies</a>
@endsection
