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
	Route::prefix('carousel')->group(function(){
		Route::get('/{carousel}', 'BackendController@carousel')->name('carousel.index');
		Route::get('/{carousel}/image/create', 'CarouselImagesController@create')->name('carousel.image.create');
		Route::post('/{carousel}/image/store', 'CarouselImagesController@store')->name('carousel.image.store');
		Route::get('/{carousel}/{image}/show', 'CarouselImagesController@show')->name('carousel.image.show');
		Route::get('/{carousel}/{image}/edit', 'CarouselImagesController@edit')->name('carousel.image.edit');
		Route::post('/{carousel}/{image}/update', 'CarouselImagesController@update')->name('carousel.image.update');
		Route::get('/{carousel}/{image}/delete', 'CarouselImagesController@destroy')->name('carousel.image.delete');
	});

	// galleries
	Route::prefix('galleries')->group(function(){
		// gallery images
		Route::resource('images', 'ImagesController', ['except' => ['index']]);
		Route::get('/images', 'BackendController@gallery')->name('images.index');
		// albums
		Route::resource('albums', 'AlbumsController', ['except' => ['index']]);
		Route::get('/album', 'BackendController@album')->name('albums.index');
		// album images
		Route::prefix('albums')->group(function(){
			Route::get('/{album}/images/create', 'AlbumImagesController@create')->name('album.images.create');
			Route::post('/{album}/images', 'AlbumImagesController@store')->name('album.images.store');
			Route::name('album.')->group(function(){
				Route::resource('images', 'AlbumImagesController', ['only' => ['edit', 'update', 'show']]);
				// assigned the route name to album.images.[edit, update, show]
			});
		});
	});

	// couple
	Route::prefix('couple')->group(function(){
		Route::get('/', 'BackendController@couple')->name('couple.index');
		Route::post('/store', 'CoupleController@store')->name('couple.store');
		Route::patch('/update', 'CoupleController@update')->name('couple.update');
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
Route::get('/gallery', 'FrontendController@gallery');
Route::get('/{page_title}/{post_title}', 'PostsController@read')->name('post.read');

