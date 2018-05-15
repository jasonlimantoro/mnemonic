<?php

use Illuminate\Database\Seeder;
use App\Permission;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$permissions = factory(Permission::class, 10)->make();

		foreach ($permissions as $permission) {
			repeat:
			try {
				$permission->save();
			} catch (\Illuminate\Database\QueryException $e){
				$permission = factory(Permission::class)->make();
				goto repeat;
			}
		}
    }
}
