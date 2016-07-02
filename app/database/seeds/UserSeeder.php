<?php

use Illuminate\Database\Seeder;
use CorpseFinder\Role;
use CorpseFinder\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
        $userRole = Role::whereName('user')->first();

        $user = User::create(array(
            'fullname'      => 'Valentine Mwangi',
            'email'         => 'mwangi_valentino@yahoo.com',
            'password'      => Hash::make('password')
        ));
        $user->assignRole($adminRole);

        $user = User::create(array(
            'fullname'    => 'Valentine Mwangi',
            'email'         => 'mail@valentinemwangi.com',
            'password'      => Hash::make('password')
        ));
        $user->assignRole($userRole);
    }
}
