<?php

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

Route::get('like', function () {
    event(new App\Events\PostLiked('Vitalis'));
    return view('success');
});

Route::match(['get', 'post'], '/publish', 'PostController@savePost');

Route::get('/', 'PostController@getPosts');
