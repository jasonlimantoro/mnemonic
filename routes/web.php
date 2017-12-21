<?php
/*
    |--------------------------------------------------------------------------
    | Backend
    |--------------------------------------------------------------------------
    |
    |
*/
// Websites
Route::get('/admin', 'BackendController@index')->name('admin');

Route::get('/admin/main-carousel', 'BackendController@carousel')->name('carousel.index');
Route::post('/admin/main-carousel/{carouselId}/upload', 'CarouselImagesController@upload')
        ->name('carousel.image.upload');

Route::get('/admin/main-carousel/{image}/delete', 'CarouselImagesController@destroy')
        ->name('carousel.image.delete');

Route::get('/admin/main-carousel/{image}/show', 'CarouselImagesController@show')
        ->name('carousel.image.show');


Route::get('/admin/pages/{page}', 'BackendController@showPage')->name('pages.show');
Route::get('/admin/galleries', 'BackendController@gallery');

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


// Form routes for posts
Route::get('/posts', 'PostsController@index')->name('post.index');
Route::get('/admin/pages/{page}/posts/create', 'PostsController@create')->name('post.create');
Route::post('/admin/pages/{page}/post', 'PostsController@store')->name('post.store');
Route::get('/admin/posts/{post}/edit', 'PostsController@edit')->name('post.edit');
Route::post('/admin/posts/{post}/update', 'PostsController@update')->name('post.update');
Route::get('/admin/posts/{post}/delete', 'PostsController@destroy')->name('post.delete');
Route::get('/admin/posts/{post}', 'PostsController@show')->name('post.show');


/*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    |
    |
*/
// To display login and registration button
Auth::routes();

Route::get('/', 'FrontendController@home')->name('home');
Route::get('/about-us', 'FrontendController@about');
Route::get('/galleries', 'FrontendController@gallery');
Route::get('/{page_title}/{post_title}', 'PostsController@read')->name('post.read');


