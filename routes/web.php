<?php
/*
    |--------------------------------------------------------------------------
    | Backend
    |--------------------------------------------------------------------------
    |
    |
*/

Route::get('/admin/pages/{page}/posts', 'BackendController@page')
        ->name('page.posts.index');

Route::prefix('admin')->group(function(){
	Route::get('/', 'BackendController@index')->name('admin');

	// carousel
	Route::prefix('carousel/{carousel}')->group(function(){
		Route::get('/', 'BackendController@carousel')->name('carousel.index');
		Route::name('carousel.')->group(function(){
			Route::resource('images', 'CarouselImagesController', ['except' => ['index']]);
		});
	});

	// galleries
	Route::prefix('galleries')->group(function(){
		// gallery images
		Route::resource('images', 'ImagesController', ['except' => ['index']]);
		Route::get('/images', 'BackendController@gallery')->name('images.index');
		// albums
		Route::resource('albums', 'AlbumsController', ['except' => ['index']]);
		Route::get('albums', 'BackendController@album')->name('albums.index');
		// album images
		Route::prefix('albums/{album}')->group(function(){
			Route::name('album.')->group(function(){
				Route::resource('images', 'AlbumImagesController', ['except' => ['index']]);
				// assigned the route name to album.images.[edit, update, show, ...]
			});
		});
	});

	// couple
	Route::prefix('couple')->group(function(){
		Route::get('/', 'BackendController@couple')->name('couple.index');
		Route::post('/store', 'CoupleController@store')->name('couple.store');
		Route::patch('/update', 'CoupleController@update')->name('couple.update');
	});

	// posts
	Route::prefix('/pages/{page}')->group(function(){
		Route::resource('posts', 'PostsController');
	});
});

// Route::get('/admin/wedding/event', 'BackendController@event');
Route::get('/admin/wedding/bridesmaid-and-bestman', 'BackendController@brides');
Route::get('/admin/wedding/vendors', 'BackendController@vendors');
Route::get('/admin/wedding/rsvp', 'BackendController@rsvp');

// Settings
Route::get('/admin/settings/general', 'BackendController@general');
Route::get('/admin/settings/site-info', 'BackendController@site');
Route::get('/admin/settings/social-media-and-seo', 'BackendController@social');
Route::get('/admin/settings/manage-admin', 'BackendController@manageAdmin');
Route::get('/admin/settings/manage-roles', 'BackendController@manageRoles');




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
Route::get('/gallery', 'FrontendController@gallery');
Route::get('/{page_title}/{post_title}', 'PostsController@read')->name('post.read');

