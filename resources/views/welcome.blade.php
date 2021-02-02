<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDB CLONE</title>
</head>
<body>
    <h3>Group 6</h3>
    <a href="{{action([App\Http\Controllers\CommentController::class, 'index'])}}">View all Comments</a>
    <a href="{{action([App\Http\Controllers\GenreController::class, 'index'])}}">View all Genres</a>
    <a href="{{action([App\Http\Controllers\TitleController::class, 'index'])}}">View all Titles</a>
</body>
</html>