<?php

use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TitleController as AdminTitleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\WatchlistController as AdminWatchlistController;
use App\Http\Controllers\Admin\WatchlistItemController as AdminWatchlistItemController;
use App\Http\Controllers\Admin\UploadController as AdminUploadController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
// image
use App\Http\Controllers\UploadController;
// image
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

// this renders the landing page for visitors
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// this renders the page after login, what we call dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();


// all admin routes are here, inside of a protecting middleware
Route::prefix('admin')->middleware('user_admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', AdminUserController::class);
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

    //WATCHLIST ROUTE FOR ADMIN
    Route::get('watchlists/{watchlist}/addItems', [AdminWatchlistController::class, 'addItems'])->name('watchlists.addItems');
    Route::post('watchlists/{watchlist}/addWatchlistItem', [AdminWatchlistController::class, 'addWatchlistItem'])->name('watchlists.addWatchlistItem');
    Route::resource('watchlists', AdminWatchlistController::class);

    //WATCHLISTITEM ROUTE FOR ADMIN
    Route::resource('watchlistItems', AdminWatchlistItemController::class);

    // for uploading images
    Route::get('/upload', [AdminUploadController::class, 'uploadFormAdmin']);
    Route::post('/upload', [AdminUploadController::class, 'uploadFileAdmin'])->name('upload.uploadfileadmin');
    Route::post('/remove/{user}', [AdminUploadController::class, 'destroy']);
});


// miscellaneous routes 
Route::get('/reviews/{review}/delete', [ReviewController::class, 'delete'])->name('reviews.delete');
Route::get('/watchlists/search', [WatchlistController::class, 'search'])->name('watchlists.search');
Route::get('/watchlists/add_title_to_watchlist/{watchlist}/{title}', [WatchlistController::class, 'add_title_to_watchlist']); //this method is basically api
Route::get('/search', [TitleController::class, 'search'])->name('search');
Route::get('/upload', [UploadController::class, 'uploadForm']);
Route::post('/upload', [UploadController::class, 'uploadFile'])->name('upload.uploadfile');
Route::post('/remove/{user}', [UploadController::class, 'destroy']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// resource routes
Route::resource('genres', GenreController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('titles', TitleController::class);
Route::resource('comments', CommentController::class);
Route::resource('watchlists', WatchlistController::class);
Route::resource('watchlistItems', WatchlistItemController::class);
Route::resource('user', UserController::class);
