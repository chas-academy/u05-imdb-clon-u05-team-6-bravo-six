<div class="mx-2 title-card-wrapper">
    <div class="card title-card">
         <div class="row">
         <div class=" col-md-6">
          <a href="{{action([App\Http\Controllers\WatchlistController::class, 'show'], ["watchlist"=>$watchlist->id])}}"><h3>{{$watchlist->name}}</h3></a>
         <p>Last updated: {{$watchlist->updated_at}}</p></div>
          <div class="col-md-6">
               <div class="col-md-8 float-right">
          {{-- @if ($user->img_url !== null)
               <img src="{{ asset('storage/' . $user->img_url) }}" alt="No photo" class="rounded-circle float-right" style="max-width: 80px">
          @else
               <img src="https://crestedcranesolutions.com/wp-content/uploads/2013/07/facebook-profile-picture-no-pic-avatar.jpg" alt="No profile picture" class="rounded-circle float-right" style="max-width: 80px">
          @endif --}}
         <p class="float-right">Created by: {{$user->name}}</p>
         </div>
         </div>
         </div>
         {{-- if i remove these 2 divs the aside moves around wonky  --}}
            <div class="dropdown col-md-3">
              <div>
                        </div>
              </div>
    </div>
</div>
