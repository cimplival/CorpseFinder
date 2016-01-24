<?php 

namespace TumshangilieBwana\Repositories;

use TumshangilieBwana\Role;
use TumshangilieBwana\User;
use TumshangilieBwana\Password;
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