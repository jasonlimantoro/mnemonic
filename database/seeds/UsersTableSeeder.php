<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Jason',
                    'email' => 'jason@example.com',
                    'password' => bcrypt('123123123'),
                    'remember_token' => str_random(),
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'name' => 'Feli',
                    'email' => 'feli@example.com',
                    'password' => bcrypt('234234234'),
                    'remember_token' => str_random(),
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]
            ]
        );
    }
}
