<?php

use Illuminate\Database\Seeder;

class VIPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('VIP')->insert(
            [
                [
					'name' => 'Victor Immanuel Rumende, S. Kom',
                    'mother' => 'Mrs. Sandra Angelia',
                    'father' => 'Mr. Budi Darma',
                    'gender' => 'male'
                ],
                [
					'name' => 'Lenny Kurniawati Ligadjaja, S. E',
                    'mother' => 'Mrs. Vina K. Dhian',
                    'father' => 'Mr. Samuel Tanto',
                    'gender' => 'female'
                ]
            ]
        );
    }
}
