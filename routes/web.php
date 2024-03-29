<?php

use App\Mail\signup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    return redirect('/posts');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('posts', 'App\Http\Controllers\PostController@index')->name('posts.index');
Route::get('posts/create', 'App\Http\Controllers\PostController@create')->name('posts.create');
Route::post('posts', 'App\Http\Controllers\PostController@store')->name('posts.store');

///Comments route
Route::get('comments/create', 'App\Http\Controllers\CommentController@create')->name('comments.create');
Route::post('comments', 'App\Http\Controllers\CommentController@store')->name('comments.store');


Route::get('testemail', function ($user){
    Mail::to($user->email)->send(new signup($user));
});

//Show must be the last route
Route::get('posts/{id}', 'App\Http\Controllers\PostController@show')->name('posts.show');
