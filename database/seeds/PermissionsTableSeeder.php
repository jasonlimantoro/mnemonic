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
            'vip',
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
			'event',
			'bridesmaid_bestman',
			'vendor',
			'vendor_categories',
			'rsvp',
			'user',
			'role'
		];

		$incomplete = [
			'vip',
			'embed_video',
			'site_info',
			'site_social',
			'site_seo',
		];

		$manageable = [
			'gallery'
		];

		foreach ($states as $state) {
			if(in_array($state, $complete)){
				factory(Permission::class)->states('complete', $state)->create();
			} else if (in_array($state, $incomplete)){
				factory(Permission::class)->states('incomplete', $state)->create();
			} else if (in_array($state, $manageable)){
				factory(Permission::class)->states('manageable', $state)->create();
			}
		}
    }
}
