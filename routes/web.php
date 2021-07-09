<?php

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
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;

// use App\Http\Controllers\CommmentController;




Route::get('/', function () {
    return view('welcome');
});


Route::resource('/films', FilmController::class);
Route::resource('/users', CommentController::class);


// Route::resource('/comments', CommmentController::class);


// Route::get('films','FilmController@index');

// Route::get('films/create','FilmController@create');
// Route::get('/films', [FilmController::class, 'index']);
// Route::get('films/create', [FilmController::class, 'create']);
// Route::post('/films', [FilmController::class, 'store']);
// Route::get('films/{id}/edit', [FilmController::class, 'edit']);
// Route::put('films/{id}', [FilmController::class, 'update']);
// Route::get('films/{id}', [FilmController::class, 'destroy']);



Auth::routes();
Route::get('admin/films', 'App\Http\Controllers\FilmController@index')->name('admin.route')->middleware('admin');
Route::get('/user', [App\Http\Controllers\CommentController::class, 'index'])->name('user');


