<div class="mx-2 title-card-wrapper">
     <div class="card title-card">
          <div class="row">
          <div class="col-md-6" >
               <h5>{{$title->title}}</h5>
               <img src="{{$title->img_url}}">
               <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$title->id])}}">{{$title->title}}</a>
          </div>
          {{-- <span class="dropdown_activator"></span> --}}

          <div class="dropdown col-md-6">
               @auth
               <button class="btn btn-secondary dropdown-toggle fas fa-plus" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="list-unstyled">
                         @foreach ($watchlists as $watchlist)
                              {{-- loop through watchlists --}}

                              <li class="watchlist_listitem
                              @if($watchlist->watchlistItems()->contains('title_id', $title->id))
                              {{-- if title is already in watchlist --}}
                                   added
                              @endif
                              " data-id="{{$watchlist->id}}" data-title="{{$title->id}}">{{$watchlist->name}}<span><i class="
@if($watchlist->watchlistItems()->contains('title_id', $title->id))
fas fa-check
@endif
                                   "></i></span></li>
                         @endforeach
                              </ul>
               </div>
               @endauth
          </div>
          </div>
     </div>
</div>