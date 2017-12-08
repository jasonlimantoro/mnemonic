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

Route::get('/', function () {
    return view('welcome');
});

// To display login and registration button
Auth::routes();

Route::get('/admin', 'AdminsController@index')->name('admin');

Route::get('/admin/posts', 'PostsController@index');
Route::get('/admin/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
