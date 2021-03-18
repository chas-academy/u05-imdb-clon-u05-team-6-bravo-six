<div class=" col-md-2 col-xs-12 mt-2"><aside class=" card px-2">
    <h3 class="border-bottom">Links</h3>
    <ul class="list-unstyled">
        <li><a href="{{action([\App\Http\Controllers\GenreController::class, 'index'])}}">Movies</a></li>
        @auth
        <li>
            <a href="">Dashboard</a>
        </li>
        @endauth
        <h5 class="border-bottom mt-2">Genres</h5>
        @if ($currentPage)
        <?php $currentGenre = \App\Models\Genre::find($currentPage);?>
        <li><a class=" active font-weight-bold breadcrumb-item" href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $currentGenre->id])}}">{{$currentGenre->name}}</a></li>
        @endif
        @foreach(\App\Models\Genre::all()->take(7) as $genre)
        @if(!($currentPage === $genre->id))
        <li>
            <a class="breadcrumb-item" href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a></li>
        @endif
        @endforeach
        <li><a href="{{action([\App\Http\Controllers\GenreController::class, 'index'])}}">...</a></li>
    </ul>
</aside>
</div>