@extends('layouts.app')
@section('content')

<ul>
@foreach ($watchlistItems as $watchlistItem)
<li>{{$watchlistItem->title_id}}<span> belongs to: {{$watchlistItem->watchlist_id}} </span></li>
@endforeach
</ul>

@endsection