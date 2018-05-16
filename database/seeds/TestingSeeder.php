<?php

use Illuminate\Database\Seeder;

class TestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			// UsersTableSeeder::class,
			RolesTableSeeder::class,
			PermissionsTableSeeder::class
        ]);
    }
}
