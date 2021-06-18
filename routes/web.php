<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// Route::get('/about', function () {
//     $team = [
//         ['name' => 'Hodor', 'position' => 'programmer'],
//         ['name' => 'Joker', 'position' => 'CEO'],
//         ['name' => 'Elvis', 'position' => 'CTO'],
//     ];
//     return view('about', ['team' => $team]);
// });
Route::get('about', [PageController::class, 'about']);

Route::get('articles', [ArticleController::class, 'index'])
//имя маршрута нужно для того, чтобы не создавать ссылки руками
->name('articles.index');

Route::get('articles/create', 'ArticleController@create')
->name('articles.create');

Route::post('articles', 'ArticleController@store')
->name('articles.store');

Route::get('articles/{id}', [ArticleController::class, 'show'])
->name('articles.show');

Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])
->name('articles.edit');

Route::patch('articles/{id}', [ArticleController::class, 'update'])
->name('articles.update');
// Route::get('/about', 'PageController@about');
// Route::get('/about', 'App\Http\Controllers\PageController@about');
