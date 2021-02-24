<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add_post', [App\Http\Controllers\PostController::class, 'getPost']);
Route::post('/add_post', [App\Http\Controllers\PostController::class, 'add_post'])->name('add_post');
Route::get('/post', [App\Http\Controllers\PostController::class, 'post']);
Route::delete('/delete_post/{id}', [App\Http\Controllers\PostController::class, 'destory'])->name('delete.post');
Route::delete('/delete_tag/{id}', [App\Http\Controllers\TagController::class, 'destory'])->name('delete.tag');
Route::delete('/delete_video/{id}', [App\Http\Controllers\VideoController::class, 'destory'])->name('delete.video');
Route::get('/show_post/{id}', [App\Http\Controllers\PostController::class, 'ShowpostByid'])->name('show.post');
Route::get('/updatePost/{id}', [App\Http\Controllers\PostController::class, 'updatePost'])->name('update.post');
Route::post('/updatePostfunction/{id}', [App\Http\Controllers\PostController::class, 'updatePostFunction'])->name('update.post.function');

