<?php

use Illuminate\Database\Seeder;
use TumshangilieBwana\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        DB::table('roles')->delete();

        Role::create([
            'name' => 'user'
        ]);

        Role::create([
            'name' => 'administrator'
        ]);
    }
}
