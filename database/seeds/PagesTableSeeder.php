<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert(
            [
                [
                    'user_id' => 1,
                    'title' => 'Home',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'user_id' => 1,
                    'title' => 'About Us',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]
            ]
        );
    }
}
