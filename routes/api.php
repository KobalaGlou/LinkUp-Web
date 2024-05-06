<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/book', [ApiController::class, 'apiBook']);
Route::post('/api/jeuxSociete', [ApiController::class, 'apiJeuxSocieteByName'])->name('jeuxSociete.search');
Route::post('/api/jeuxVideo', [ApiController::class, 'apiJeuxVideoByName'])->name('jeuxVideo.search');
Route::post('/api/film', [ApiController::class,'apiFilmByName'])->name('film.search');
Route::post('/api/book', [ApiController::class,'apiBookByName'])->name('book.search');
Route::post('/api/jeuxSocieteId', [ApiController::class,'apiJeuxSocieteById'])->name('jeuxSocieteId.search');
Route::post('/api/jeuxVideoId', [ApiController::class,'apiJeuxVideoById'])->name('jeuxVideoId.search');
Route::post('/api/filmId', [ApiController::class,'apiFilmById'])->name('filmId.search');
Route::post('/api/bookId', [ApiController::class,'apiBookById'])->name('bookId.search');