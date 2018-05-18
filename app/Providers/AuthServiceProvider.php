<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		\App\Post::class => \App\Policies\PostPolicy::class,
		\App\Couple::class => \App\Policies\CouplePolicy::class,
		\App\Event::class => \App\Policies\EventPolicy::class,
		\App\BridesBest::class => \App\Policies\BridesBestPolicy::class,
		\App\Vendor::class => \App\Policies\VendorPolicy::class,
		\App\Category::class => \App\Policies\CategoryPolicy::class,
		\App\RSVP::class => \App\Policies\RSVPPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
		$this->registerPolicies();

		$this->registerGalleryPolicies();
		
		$this->registerCarouselImagesPolicies();

	}

	public function registerGalleryPolicies()
	{
		Gate::define('manage-gallery', function($user){
			return in_array('manage', $user->permissibles('gallery'));
		});
	}
	
	public function registerCarouselImagesPolicies()
	{
		Gate::define('create-carousel-image', function($user){
			return in_array('create', $user->permissibles('carousel images'));
		});
	
		Gate::define('read-carousel-image', function($user){
			return in_array('read', $user->permissibles('carousel images'));
		});
	
		Gate::define('update-carousel-image', function($user){
			return in_array('update', $user->permissibles('carousel images'));
		});
	
		Gate::define('delete-carousel-image', function($user){
			return in_array('delete', $user->permissibles('carousel images'));
		});
	
	}
}
