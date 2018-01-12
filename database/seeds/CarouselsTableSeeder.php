<?php

use Illuminate\Database\Seeder;

class CarouselsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousels')->insert(
            [
                [
                    'page_id' => 1,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'page_id' => 2,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]
            ]
        );
    }
}
