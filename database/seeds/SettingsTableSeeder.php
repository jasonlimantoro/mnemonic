<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
			[
				'name' => 'Site Info',
				'key' => 'site-info',
				'value' => json_encode([
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
				])
			],
			[
				'name' => 'Some Settings',
				'key' => 'some-setting',
				'value' => json_encode([
					'some-key' => 'some-value',
					'some-another-key' => 'some-another-value'
				])
			],
			[
				'name' => 'Some Other Settings',
				'key' => 'some-other-setting',
				'value' => json_encode([
					'some-some-key' => 'some-some-value',
					'some-some-another-key' => 'some-some-another-value'
				])
			]
		]);
    }
}
