<?php

use Illuminate\Database\Seeder;

class CoupleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('couple')->insert(
            [
                [
					'name' => 'Victor Immanuel Rumende, S. Kom',
					'image_id' => 8,
                    'mother' => 'Mrs. Sandra Angelia',
                    'father' => 'Mr. Budi Darma',
                    'role' => 'groom'
                ],
                [
					'name' => 'Lenny Kurniawati, S. E',
					'image_id' => 9,
                    'mother' => 'Mrs. Vina K. Dhian',
                    'father' => 'Mr. Samuel Tanto',
                    'role' => 'bride'
                ]
            ]
        );
    }
}
