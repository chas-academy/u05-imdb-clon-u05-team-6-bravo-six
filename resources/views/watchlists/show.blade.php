@extends('layouts.app')

@section('content')
{{-- <ul> --}}
    <h1>{{$watchlist->name}}</h1>
    <h4 class="text-mutet">By: {{\App\Models\User::find($watchlist->user_id)->name}}</h4>
    @foreach ($watchlistItems as $item)
    <?php
$title = $item->title();
    ?>
<x-title-card :title="$title" :watchlists="null" :moddable="false"></x-title-card>
    @endforeach

@endsection