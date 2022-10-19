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

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/posts/{post_name}', function ($post_name) {


    $file_name = __DIR__. '/../resources/posts/' . $post_name . '.html';
        if(!file_exists($file_name)){
            //return 404
            return abort(404);
        }
    $post_content = file_get_contents($file_name);
    return view('post', [
        'post_content' => $post_content
    ]);
});

