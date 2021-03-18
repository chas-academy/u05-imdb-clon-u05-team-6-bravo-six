<aside class=" card col-md-2 col-xs-12">
    <ul class="list-unstyled">
        <li><a href="{{action([\App\Http\Controllers\GenreController::class, 'index'])}}">Movies</a></li>
        @auth
        <li>
            <a href="">Dashboard</a>
        </li>
        @endauth
        @foreach(\App\Models\Genre::all()->take(7) as $genre)
        <li><a href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a></li>
        @endforeach
        <li><a href="{{action([\App\Http\Controllers\GenreController::class, 'index'])}}">...</a></li>
    </ul>
</aside>