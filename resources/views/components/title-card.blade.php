<div class="mx-2 title-card-wrapper">
     <div class="card title-card">
          <div class="row">
          <div class="col-md-3" >
                <img src="
               @if($title->img_url !== null)
               {{  $title->img_url}}
               @else
               https://i.pinimg.com/564x/2b/55/06/2b55061c90ebcda12a3aedbbb00bbaf5.jpg
               @endif
               " class="img-fluid img-thumbnail ">

          </div>
          {{-- <span class="dropdown_activator"></span> --}}
          <div class=" col-md-6">

          <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$title->id])}}"><h3>{{$title->title}}</h3></a>
          {{-- <div class="container"> --}}
               <span class="row"><a class="mr-2 px-1 card" href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $title->genre()->id])}}">{{$title->genre()->name}}</a></span>
               <ul class="list-unstyled row">
               @foreach($title->genres()->get() as $genre)
                    <li><a class="text-muted mr-2 px-1 card" href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a></li>
               @endforeach
           
               </ul>
          {{-- </div> --}}
          <p>{{$title->description}}</p>
          </div>
          @if($moddable)
          <div class="dropdown col-md-3">
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
                                  <li><a href="{{route('dashboard')}}">Add watchlist</a></li>
                              </ul>
                         </div>
                    @endauth
               </div>
               @endif
          </div>
     </div>
</div>
