<?php

use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TitleController as AdminTitleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\WatchlistItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/bootstrap', function () {
    return view('bootstrap');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();
Route::prefix('admin')->middleware('user_admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    // TITLE ROUTES FOR ADMIN
    Route::get('/titles/{title}/reviews', [AdminTitleController::class, 'reviews']);
    Route::get('/titles/{title}/secondary-genres', [AdminTitleController::class, 'secondary_genres']);
    Route::put('/titles/{title}/secondary-genres', [AdminTitleController::class, 'update_genres']);
    Route::resource('titles', AdminTitleController::class);
    //
    //COMMENT ROUTES FOR ADMIN
    Route::resource('comments', AdminCommentController::class);
    Route::resource('genres', AdminGenreController::class);

    //REVIEW ROUTE FOR ADMIN
    Route::resource('reviews', AdminReviewController::class); //JE
});
Route::resource('genres', GenreController::class);
Route::get('/titles/{title}/reviews', [TitleController::class, 'reviews']);
Route::resource('titles', TitleController::class);
Route::resource('comments', CommentController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('watchlists', WatchlistController::class);
Route::resource('watchlistitems', WatchlistItemController::class);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Comments
Route::post('/comments/{$review->id}', [CommentController::class, 'comments.store']);
Route::get('/comments/{id}/edit', [CommentController::class, 'comments.edit']);
Route::put('/comments/{id}', [CommentController::class, 'comments.update']);
Route::delete('/comments/{id}', [CommentController::class, 'comments.destroy']);
Route::get('/comments/{id}/delete', [CommentController::class, 'comments.delete']);
