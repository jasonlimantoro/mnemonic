<?php
Route::get('/', 'PostsController@index')->name('home');
// To display login and registration button
Auth::routes();
Route::get('/posts', 'PostsController@index');
Route::get('/admin/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');


Route::get('/admin', 'AdminsController@index')->name('admin');
