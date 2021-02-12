@extends('layouts.app')
@section('content')

<ul>
@foreach ($watchlists as $watchlist)
<li>{{$watchlist->id}}</li>
@endforeach
</ul>

@endsection