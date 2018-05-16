<?php

use Illuminate\Database\Seeder;
use App\Permission;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$states = [
            'carousel images',
            'post',
            'gallery',
            'album',
            'couple',
            'event',
            'bridesmaid_bestman',
            'vendor',
            'vendor_categories',
            'rsvp',
            'site_info',
            'site_social',
            'site_seo',
            'user',
            'role',
		];

		$complete = [
			'carousel images',
			'post',
			'gallery',
			'album',
			'event',
			'bridesmaid_bestman',
			'vendor',
			'vendor_categories',
			'rsvp',
			'user',
			'role'
		];

		$incomplete = [
			'couple',
			'site_info',
			'site_social',
			'site_seo',
		];

		foreach ($states as $state) {
			if(in_array($state, $complete)){
				factory(Permission::class)->states('complete', $state)->create();
			} else if (in_array($state, $incomplete)){
				factory(Permission::class)->states('incomplete', $state)->create();
			}
		}
    }
}
