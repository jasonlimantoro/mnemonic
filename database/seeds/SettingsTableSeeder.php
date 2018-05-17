<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Setting::class)->states('site-info')->create([
			'value' => [
				'admin-email' => 'myemail@example.com',
				'title' => 'Awesome Title',
				'description' => 'The most awesome website',
				'logo' => null,
				'favicon' => null,
				'keywords' => 'awesome',
				'contact' => [
					'email' => 'Janedoe@example.com',
					'phone' => '298-4298-278',
					'mobile' => '9487-39847-38',
					'address' => 'Oklahoma Street Avenue no 26',
					'region' => 'North Carolina',
					'city' => 'Chicago',
					'country' => 'USA',
					'zip_code' => '294982',
				]
			]
		]);
		factory(Setting::class)->states('site-social')->create([
			'value' => [
				'google_plus' => 'https://plus.google.com/1',
				'facebook' => 'https://facebook.com/myaccount',
				'instagram' => 'https://instagram.com/myaccount',
				'youtube' => 'https://youtube.com/myaccount'
			]
		]);

		factory(Setting::class)->states('site-seo')->create([
			'value' => [
				'meta_title' => 'Some Meta Title',
				'meta_description' => 'Some meta description for SEO',
				'g_script' => 'Some Analytics Script',
			]
		]);
    }
}
