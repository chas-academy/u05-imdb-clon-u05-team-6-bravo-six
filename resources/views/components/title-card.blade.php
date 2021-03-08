<div class="mx-2">
    <div class="card title-card">
   <h5>{{$title->title}}</h5>
   <img src="{{$title->img_url}}">
   <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$title->id])}}">{{$title->title}}</a>
   <span class="dropdown_activator"><i class="fas fa-plus"></i></span>
   <div class="dropdown_watchlists">
        <ul>
        @foreach (Auth::user()->watchlists() as $watchlist)
        <li class="watchlist_listitem 
        @if($watchlist->watchlistItems()->contains($title->id))
        added
        @endif
        ">{{$watchlist->name}}</li>
        @endforeach
        </ul>
   </div>
</div>

</div>