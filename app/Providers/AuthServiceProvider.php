<?php

namespace App\Providers;

use App\Models\User;
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
        \App\VIP::class => \App\Policies\VIPPolicy::class,
		\App\Models\Post::class => \App\Policies\PostPolicy::class,
		\App\Models\RSVP::class => \App\Policies\RSVPPolicy::class,
		\App\Models\User::class => \App\Policies\UserPolicy::class,
		\App\Models\Role::class => \App\Policies\RolePolicy::class,
		\App\Models\Event::class => \App\Policies\EventPolicy::class,
		\App\Models\Vendor::class => \App\Policies\VendorPolicy::class,
		\App\Models\Category::class => \App\Policies\CategoryPolicy::class,
		\App\Models\BridesBest::class => \App\Policies\BridesBestPolicy::class,
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

		$this->registerEmbedVideoPolicies();
		
		$this->registerCarouselImagesPolicies();

		$this->registerSiteInfoPolicies();

		$this->registerSiteSocialPolicies();

		$this->registerSiteSEOPolicies();

		$this->registerPackageSettingPolicies();

	}

	public function registerGalleryPolicies()
	{
		Gate::define('manage-gallery', function(User $user){
			return in_array('manage', $user->permissibles('gallery'));
		});
	}
	
	public function registerCarouselImagesPolicies()
	{
		Gate::define('create-carousel-image', function(User $user){
			return in_array('create', $user->permissibles('carousel images'));
		});
	
		Gate::define('read-carousel-image', function(User $user){
			return in_array('read', $user->permissibles('carousel images'));
		});
	
		Gate::define('update-carousel-image', function(User $user){
			return in_array('update', $user->permissibles('carousel images'));
		});
	
		Gate::define('delete-carousel-image', function(User $user){
			return in_array('delete', $user->permissibles('carousel images'));
		});
	
	}

	public function registerEmbedVideoPolicies()
	{
		Gate::define('read-embed-video', function(User $user){
			return in_array('read', $user->permissibles('embed_video'));
		});

		Gate::define('update-embed-video', function($user){
			return in_array('update', $user->permissibles('embed_video'));
		});
	}

	public function registerSiteInfoPolicies()
	{
		Gate::define('read-site-info', function(User $user){
			return $user->isSuper() || in_array('read', $user->permissibles('site_info'));
		});
		Gate::define('update-site-info', function(User $user){
			return $user->isSuper() || in_array('update', $user->permissibles('site_info'));
		});
	}

	public function registerSiteSocialPolicies()
	{
		Gate::define('read-site-social', function(User $user){
			return $user->isSuper() || in_array('read', $user->permissibles('site_social'));
		});
		Gate::define('update-site-social', function(User $user){
			return $user->isSuper() || in_array('update', $user->permissibles('site_social'));
		});
	}

	public function registerSiteSEOPolicies()
	{
		Gate::define('read-site-seo', function(User $user){
			return $user->isSuper() || in_array('read', $user->permissibles('site_seo'));
		});
		Gate::define('update-site-seo', function(User $user){
			return $user->isSuper() || in_array('update', $user->permissibles('site_seo'));
		});
	}

    public function registerPackageSettingPolicies()
    {
        Gate::define('manage-package-settings', function(User $user){
            return $user->isSuper() || in_array('manage', $user->permissibles('package_settings'));
        });
    }
}
