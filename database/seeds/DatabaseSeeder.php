<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PagesTableSeeder::class,
            PostsTableSeeder::class,
            ImagesTableSeeder::class,
            CarouselsTableSeeder::class,
            AlbumsTableSeeder::class,
            VIPTableSeeder::class,
            VendorsTableSeeder::class,
			CategoriesTableSeeder::class,
			RSVPTableSeeder::class,
            EventsTableSeeder::class,
			BridesBestsTableSeeder::class,
			SettingsTableSeeder::class,
			RolesTableSeeder::class,
			PermissionsTableSeeder::class,
        ]);
    }
}
