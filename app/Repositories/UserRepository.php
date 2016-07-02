<?php 

namespace CorpseFinder\Repositories;

use CorpseFinder\Role;
use CorpseFinder\User;
use CorpseFinder\Password;
use Carbon\Carbon;

class UserRepository {
    public function register( $data )
    {
        $user = new User;
        $user->fullname         = ucfirst($data['fullname']);
        $user->email            = $data['email'];
        $user->password         = ($data['password']);
        $user->save();
        //Assign Role
        $role = Role::whereName('user')->first();
        $user->assignRole($role);
    }
   
}