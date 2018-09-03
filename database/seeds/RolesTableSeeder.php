<?php

use App\Models\Role;
use Illuminate\Database\Seeder;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Role::class)->states('admin')->create();
		factory(Role::class)->states('author')->create();
		factory(Role::class)->states('editor')->create();
		factory(Role::class)->states('guest')->create();
    }
}
