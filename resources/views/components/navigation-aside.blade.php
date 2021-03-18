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
        @foreach(\App\Models\Genre::all() as $genre)

        <li><a class="@if($currentPage === $genre->id) active font-weight-bold @endif breadcrumb-item
            " href="{{action([\App\Http\Controllers\GenreController::class, 'show'], ['genre' => $genre->id])}}">{{$genre->name}}</a></li>
        @endforeach
    </ul>
</aside>
</div>