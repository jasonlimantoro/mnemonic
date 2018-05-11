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
		$contact = json_encode([
			'email' => 'Janedoe@example.com',
			'phone' => '298-4298-278',
			'mobile' => '9487-39847-38',
			'address' => 'Oklahoma Street Avenue no 26',
			'region' => 'North Carolina',
			'city' => 'Chicago',
			'country' => 'USA',
			'zip_code' => '294982',
		]);
        DB::table('settings')->insert(
            [
                [
                    'name' => 'Admin Email',
					'key' => 'admin-email',
					'value' => 'myemail@example.com',
                ],
                [
                    'name' => 'Site Title',
					'key' => 'site-title',
					'value' => 'Laracast',
                ],
                [
                    'name' => 'Site Description',
                    'key' => 'site-description',
					'value' => 'Laracast',
                ],
                [
                    'name' => 'Contact',
					'key' => 'site-contact',
					'value' => $contact
                ],
                [
                    'name' => 'Site Logo',
					'key' => 'site-logo',
					'value' => null
                ],
                [
                    'name' => 'Site Keywords',
					'key' => 'site-keywords',
					'value' => null
                ],
                [
                    'name' => 'Site Favicon',
					'key' => 'site-favicon',
					'value' => null
                ],
            ]
        );
    }
}
