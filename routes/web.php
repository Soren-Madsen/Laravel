<?php

use App\Http\Controllers\FilmController;
use App\Http\Middleware\ValidateUrl;
use App\Http\Middleware\ValidateYear;
use Illuminate\Support\Facades\Route;

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

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
    // Routes included with prefix "filmout"
    Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');
    Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');
    // Split the previous combined route into two specific routes
    Route::get('films/year/{year?}', [FilmController::class, 'listFilmsByYear'])->name('filmsByYear');
    Route::get('films/genre/{genre?}', [FilmController::class, 'listFilmsByGenre'])->name('filmsByGenre');
    // Route to count films
    Route::get('films/count', [FilmController::class, 'countFilms'])->name('countFilms');
    // Route to sort films by year
    Route::get('films/sort/year', [FilmController::class, 'sortFilmsByYear'])->name('sortFilmsByYear');
    });
});
    Route::middleware('url')->group(function() {
    Route::group(['prefix' => 'filmin'], function () {
        Route::post('film', [FilmController::class, 'createFilm'])->name('film');
    });
});


