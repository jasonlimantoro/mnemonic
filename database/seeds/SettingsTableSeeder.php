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
        DB::table('settings')->insert(
            [
                [
                    'name' => 'Admin Email',
                    'key' => 'admin-email'
                ],
                [
                    'name' => 'Site Title',
                    'key' => 'site-title'
                ],
                [
                    'name' => 'Site Description',
                    'key' => 'site-description'
                ],
                [
                    'name' => 'Contact',
                    'key' => 'site-contact'
                ],
                [
                    'name' => 'Site Logo',
                    'key' => 'site-logo'
                ],
                [
                    'name' => 'Site Keywords',
                    'key' => 'site-keywords'
                ],
                [
                    'name' => 'Site Favicon',
                    'key' => 'site-favicon'
                ],
            ]
        );
    }
}
