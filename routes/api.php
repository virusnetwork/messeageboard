<?php

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comments', function () {
    return CommentResource::collection(Comment::all());
})->name('api.comments.all');
//Get all comments that have id as their parent
Route::get('/comments/{id}', function ($id) {
    return CommentResource::collection(Comment::where('post_id', '=', $id)->get());
})->name('api.comment.parent');

Route::get('/comments', function ($id) {
    return CommentResource::collection(Comment::where('post_id', '=', $id)->get());
})->name('api.comment.getUsername');

Route::get('posts/delete/{id}', 'App\Http\Controllers\PostController@destroy')->name('api.post.delete');

Route::post('comments', 'App\Http\Controllers\CommentController@apiStore')->name('api.comments.store');
