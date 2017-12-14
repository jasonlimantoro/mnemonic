<?php
Route::get('/', 'PostsController@index')->name('home');
// To display login and registration button
Auth::routes();

Route::get('/posts', 'PostsController@index');
Route::get('/admin/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

// Routing for backend

// Pages
Route::get('/admin', 'BackendController@index')->name('admin');
Route::get('/admin/pages/home', 'BackendController@home');
Route::get('/admin/pages/about-us', 'BackendController@about');
Route::get('/admin/pages/galleries', 'BackendController@gallery');

// Themes
Route::get('/admin/themes/photo-slideshow', 'BackendController@slideshow');

// Wedding
Route::get('/admin/wedding/groom-and-bride', 'BackendController@couple');
Route::get('/admin/wedding/event', 'BackendController@event');
Route::get('/admin/wedding/bridesmaid-and-bestman', 'BackendController@brides');
Route::get('/admin/wedding/vendors', 'BackendController@vendors');
Route::get('/admin/wedding/rsvp', 'BackendController@rsvp');

// Settings
Route::get('/admin/settings/general', 'BackendController@general');
Route::get('/admin/settings/site-info', 'BackendController@site');
Route::get('/admin/settings/social-media-and-seo', 'BackendController@social');
Route::get('/admin/settings/manage-admin', 'BackendController@manageAdmin');
Route::get('/admin/settings/manage-roles', 'BackendController@manageRoles');
