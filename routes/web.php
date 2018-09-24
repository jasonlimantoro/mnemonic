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
    ], function () {
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
            Route::delete('posts/{post}/remove-image', 'PostsController@removeImage')->name('posts.remove-image');
        });

        // wedding
        Route::prefix('day')->group(function () {
            // vip
            Route::patch('vip', 'VIPController@update')->name('vip.update');
            Route::get('vip/edit', 'VIPController@edit')->name('vip.edit');

            // Event
            Route::resource('events', 'EventsController')->except('show');
            Route::delete('events/{event}/remove-image', 'EventsController@removeImage')->name('events.remove-image');

            // Bridesmaid-Bestman
            Route::resource('bridesmaid-bestmans', 'BridesBestsController')->except('show');
            Route::delete('bridesmaid-bestmans/{bridesmaid_bestman}/remove-image', 'BridesBestsController@removeImage')->name('bridesmaid-bestmans.remove-image');

            // Vendors
            Route::resource('vendors', 'VendorsController')->except('show');
			Route::resource('categories', 'CategoriesController')->except('show');
			
			// Youtube Video
			Route::get('embed-video/edit', 'VIPController@editVideo')->name('embedVideo.edit');
			Route::patch('embed-video', 'VIPController@updateVideo')->name('embedVideo.update');

            // RSVP
            Route::resource('rsvps', 'RSVPController')->except('show');
            Route::post('rsvps/{rsvp}/remind', 'RSVPController@remind')->name('rsvps.remind');
        });

        // site-info
        Route::get('site-info/edit', 'SiteInfoController@edit')->name('siteinfo.edit')->middleware('can:read-site-info');
        Route::patch('site-info', 'SiteInfoController@update')->name('siteinfo.update')->middleware('can:update-site-info');

        // site-social
        Route::get('social-media/edit', 'SiteSocialController@edit')->name('sitesocial.edit')->middleware('can:read-site-social');
        Route::patch('social-media', 'SiteSocialController@update')->name('sitesocial.update')->middleware('can:update-site-social');

        // site-seo
        Route::get('social-seo/edit', 'SiteSEOController@edit')->name('siteseo.edit')->middleware('can:read-site-seo');
        Route::patch('social-seo', 'SiteSEOController@update')->name('siteseo.update')->middleware('can:update-site-seo');

        // Users
        Route::resource('users', 'UsersController')->except('show');

        // Roles
		Route::resource('roles', 'RolesController')->except('show');
		
		// Package
		Route::get('package/edit', 'PackageController@edit')->name('package.edit');
		Route::patch('package', 'PackageController@update')->name('package.update');
    });

// previewing mailables in browser
Route::get('/mailable/invitation', function () {
    $rsvp = \App\Models\RSVP::first();
    return new App\Mail\RSVPInvitation($rsvp);
});

// Previewing rsvpConfirmation email
Route::get('/mailable/reservation', function (){
   $rsvp = \App\Models\RSVP::first();
   return new App\Mail\RSVPReservation($rsvp);
});

// Previewing rsvp confirmation
Route::get('/reserved', function() {
  $rsvp = \App\Models\RSVP::first();

  $vip = \App\Models\PackageSetting::getVip();

  return view("rsvps.reserved", compact('rsvp', 'vip'));

});

// rsvp confirmation
Route::get('rsvps/{rsvp}/token/{token}/confirm', 'RSVPController@confirm')->name('rsvps.confirm');
Route::post('rsvps/confirm', 'RSVPController@confirmFromFront')->name('rsvps.confirmFromFront');

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
    Route::get('day', 'FrontendController@day')->name('day');
    Route::get('about', 'FrontendController@about')->name('about');
    Route::get('gallery', 'FrontendController@gallery')->name('gallery');
    Route::get('rsvp', 'FrontendController@rsvp')->name('rsvp');
	Route::get('posts/{post}', 'PostsController@read')->name('posts.read');
    Route::get('/', 'FrontendController@home')->name('index');
});

