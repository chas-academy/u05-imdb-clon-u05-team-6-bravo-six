<ul>
@foreach ($watchlistitems as $watchlistitem)
<li>{{$watchlistitem->title_id}}<span> belongs to: {{$watchlistitem->watchlist_id}} </span></li>
@endforeach
</ul>