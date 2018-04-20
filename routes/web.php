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

	
	// posts
	Route::prefix('/pages/{page}')->group(function(){
		Route::resource('posts', 'PostsController');
	});
	
	// wedding
	Route::prefix('wedding')->group(function(){
		// couple
		Route::resource('couple', 'CoupleController', ['only' => ['update']]);
		Route::get('couple', 'BackendController@couple')->name('couple.edit');

		// Event
		Route::resource('events', 'EventsController', ['except' => ['index']]);
		Route::get('events', 'BackendController@event')->name('events.index');

		// Bridesmaid-Bestman
		Route::resource('bridesmaid-bestmans', 'BridesBestsController', ['except' => ['index']]);
		Route::get('bridesmaid-bestmans', 'BackendController@brides_best')->name('bridesmaid-bestmans.index');

		// Vendors
		Route::resource('vendors', 'VendorsController', ['except' => ['index']]);
		Route::get('vendors', 'BackendController@vendors')->name('vendors.index');
	});

	// settings
	Route::prefix('settings')->group(function(){
		Route::resource('categories', 'CategoriesController', ['except' => ['index']]);
		Route::get('categories', 'BackendController@categories')->name('categories.index');
	});

});

// Route::get('/admin/wedding/vendors', 'BackendController@vendors');
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
Route::get('{post}', 'PostsController@read')->name('posts.read');

