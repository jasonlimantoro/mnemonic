<?php
/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------
|
|
*/

Route::group([
	'prefix' => 'admin', 
	'middleware' => ['auth']
	], function () {
    Route::get('/', 'BackendController@admin')->name('admin');

    // carousel
    Route::prefix('carousel/{carousel}')->group(function () {
        Route::name('carousel.')->group(function () {
            Route::resource('images', 'CarouselImagesController');
        });
    });

    // galleries
    Route::group([
		'prefix' => 'gallery',
		'middleware' => 'can:manage-gallery'
	], function (){
		// images
		Route::resource('images', 'ImagesController');
		// albums
		Route::resource('albums', 'AlbumsController');
	
		// album images
		Route::prefix('albums/{album}')->group(function () {
			Route::name('album.')->group(function () {
				Route::resource('images', 'AlbumImagesController', ['except' => ['index']]);
				// assigned the route name to album.images.[edit, update, show, ...]
			});
		});
	});

    // posts
    Route::prefix('/pages/{page}')->group(function () {
        Route::resource('posts', 'PostsController');
    });

    // wedding
    Route::prefix('wedding')->group(function () {
        // couple
        Route::resource('couple', 'CoupleController', ['only' => ['update']]);
        Route::get('couple', 'CoupleController@edit')->name('couple.edit');

        // Event
        Route::resource('events', 'EventsController');

        // Bridesmaid-Bestman
        Route::resource('bridesmaid-bestmans', 'BridesBestsController');

        // Vendors
        Route::resource('vendors', 'VendorsController');
        Route::resource('categories', 'CategoriesController');

        // RSVP
        Route::resource('rsvps', 'RSVPController');
        Route::post('rsvps/{rsvp}/remind', 'RSVPController@remind')->name('rsvps.remind');
    });

    // settings
    Route::get('settings/edit', 'SiteInfoController@edit')->name('siteinfo.edit');
    Route::patch('settings', 'SiteInfoController@update')->name('siteinfo.update');

	// Social Media
	Route::get('social-media/edit', 'SocialController@edit')->name('socials.edit');
	Route::patch('social-media', 'SocialController@update')->name('socials.update');

	// SEO
	Route::get('seo/edit', 'SEOController@edit')->name('seo.edit');
	Route::patch('seo', 'SEOController@update')->name('seo.update');

	// Users
	Route::resource('users', 'UsersController');

	// Roles
	Route::resource('roles', 'RolesController');

});

// previewing mailables in browser
Route::get('/mailable', function () {
    $rsvp = \App\RSVP::find(1);
    return new App\Mail\RSVPInvitation($rsvp);
});

// rsvp confirmation
Route::get('rsvps/{rsvp}/token/{token}/confirm', 'RSVPController@confirm')->name('rsvps.confirm');

/*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    |
    |
*/
// To display login and registration button
Auth::routes();

// Pages
Route::name('front.')->group(function () {
    Route::get('wedding-day', 'FrontendController@wedding')->name('wedding');
    Route::get('about-us', 'FrontendController@about')->name('about');
    Route::get('gallery', 'FrontendController@gallery')->name('gallery');
    Route::get('rsvp', 'FrontendController@onlineRSVP')->name('rsvp');
    Route::get('/', 'FrontendController@home')->name('index');
});


Route::post('avatar', 'ImagesController@upload');
Route::get('{post}', 'PostsController@read')->name('posts.read');
