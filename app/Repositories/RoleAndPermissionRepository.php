<?php

namespace CorpseFinder\Repositories;

use Illuminate\Support\Facades\DB;

class RoleAndPermissionRepository
{
    public $auto_save = false;

    protected $defaults = [];

    /**
     * Using booleans because they're faster and lighter to check then using empty() function.
     * @var array and boolean
     */
    public $roles                   = [];
    public $roles_active            = false;

    public $permissions             = [];
    public $permissions_active      = false;

    /**
     * the active methods array name
     * @var string
     */
    private $active = '';

    public function __construct()
    {
        $this->defaults = Config('predefined.roles-and-perms');
    }

    public function getRoles($useDefaults = true)
    {
        $func_name = 'roles';
        $this->active = $func_name;
        if($useDefaults)
        {
           $Roles = $this->getDefaults($func_name);
        }

        $this->bindVariable($func_name, !empty($Roles) ? $Roles : $this->retrieveDBRecords($func_name));
        $this->roles_active = true;

        if($this->auto_save)
        {
            $this->save();
        }

        return $this;
    }

    public function getPermissions($useDefaults = true, $raw = false)
    {
        $func_name = 'permissions';
        $this->active = $func_name;
        if($useDefaults)
        {
            $permissions = $this->getDefaults($func_name);

            if($raw)
                return $permissions;

            $Perms = [];
            foreach ($permissions as $key => $array) {
                foreach ($array as $target) {
                    $Perms[] = $key.'-'.$target;
                }
            }
        }
        $this->bindVariable($func_name, !empty($Perms) ? $Perms : $this->retrieveDBRecords($func_name));
        $this->permissions_active = true;

        if($this->auto_save)
        {
            $this->save();
        }

        return $this;
    }

    public function update($key, $value)
    {
        if($this->exist($key))
            $this->{$this->active}[$key] = $value;
    }

    public function remove($key)
    {
        if($this->exist($key))
            unset($this->{$this->active}[$key]);
    }

    public function add($key, $value = '')
    {
        if(!$this->exist($key))
            $this->{$this->active}[$key] = $value;

        if(is_array($key))
        {
            foreach ($key as $k => $v) {
                $this->{$this->active}[$k] = $v;
            }

        }
    }

    public function exist($key)
    {
        if($this->permissions_active)
            return in_array($key, array_keys($this->permissions));

        if($this->roles_active)
            return in_array($key, array_keys($this->roles));
    }

    public function toArray()
    {
        if($this->permissions_active)
            return $this->permissions;
        
        if($this->roles_active)
            return $this->roles;
        
        return [];
    }

    public function save()
    {
        if($this->permissions_active)
            DB::insert($this->permissions);

        if($this->roles_active)
            DB::insert($this->roles);
    }

    private function retrieveDBRecords($for)
    {
        return DB::table($for)->get();
    }

    private function getDefaults($for)
    {
        $for = ucfirst($for);
        if(in_array($for, array_keys($this->defaults)))
            return $this->defaults[$for];
    }

    private function bindVariable($for, array $data = [])
    {
        if(!empty($data))
            $this->{strtolower($for)} = $data;

        return false;
    }

    /**
     * I didn't get done with translations and had to cut it short :-)
     * @return array
     */
    public static function getRoleTranslations()
    {
        return [
            /* -------- Role Names -------- */
            'name'          =>  [

                'delete'    =>  [
                    'user'                              =>  'roles.name.delete.user',
                    'Permission'                        =>  'roles.name.delete.Role',
                    'role'                              =>  'roles.name.delete.role',
                    'movie'                             =>  'roles.name.delete.movie',
                    'biography'                         =>  'roles.name.delete.biography',
                    'director'                          =>  'roles.name.delete.director',
                    'actor'                             =>  'roles.name.delete.actor',
                    'studio'                            =>  'roles.name.delete.studio',
                    'director_movie_relationship'       =>  'roles.name.delete.dm_rel',
                    'genre'                             =>  'roles.name.delete.genre',
                ],
                'create'    =>  [
                    'user'                              =>  'roles.name.create.user',
                    'Permission'                        =>  'roles.name.create.Role',
                    'role'                              =>  'roles.name.create.role',
                    'movie'                             =>  'roles.name.create.movie',
                    'biography'                         =>  'roles.name.create.biography',
                    'director'                          =>  'roles.name.create.director',
                    'actor'                             =>  'roles.name.create.actor',
                    'studio'                            =>  'roles.name.create.studio',
                    'director_movie_relationship'       =>  'roles.name.create.dm_rel',
                    'genre'                             =>  'roles.name.create.genre',
                ],
                'edit'      =>  [
                    'user'                              =>  'roles.name.edit.user',
                    'Permission'                        =>  'roles.name.edit.Role',
                    'role'                              =>  'roles.name.edit.role',
                    'movie'                             =>  'roles.name.edit.movie',
                    'biography'                         =>  'roles.name.edit.biography',
                    'director'                          =>  'roles.name.edit.director',
                    'actor'                             =>  'roles.name.edit.actor',
                    'studio'                            =>  'roles.name.edit.studio',
                    'director_movie_relationship'       =>  'roles.name.edit.dm_rel',
                    'genre'                             =>  'roles.name.edit.genre',
                ],

            ],

            /* -------- Display Names -------- */
            'display_name'  =>  [

                'delete'    =>  [
                    'user'                              =>  'roles.display.delete.user',
                    'Permission'                        =>  'roles.display.delete.Role',
                    'role'                              =>  'roles.display.delete.role',
                    'movie'                             =>  'roles.display.delete.movie',
                    'biography'                         =>  'roles.display.delete.biography',
                    'director'                          =>  'roles.display.delete.director',
                    'actor'                             =>  'roles.display.delete.actor',
                    'studio'                            =>  'roles.display.delete.studio',
                    'director_movie_relationship'       =>  'roles.display.delete.dm_rel',
                    'genre'                             =>  'roles.display.delete.genre',

                ],
                'create'    =>  [
                    'user'                              =>  'roles.display.create.user',
                    'Permission'                        =>  'roles.display.create.Role',
                    'role'                              =>  'roles.display.create.role',
                    'movie'                             =>  'roles.display.create.movie',
                    'biography'                         =>  'roles.display.create.biography',
                    'director'                          =>  'roles.display.create.director',
                    'actor'                             =>  'roles.display.create.actor',
                    'studio'                            =>  'roles.display.create.studio',
                    'director_movie_relationship'       =>  'roles.display.create.dm_rel',
                    'genre'
                ],
                'edit'      =>  [
                    'user'                              =>  'roles.display.edit.user',
                    'Permission'                        =>  'roles.display.edit.Role',
                    'role'                              =>  'roles.display.edit.role',
                    'movie'                             =>  'roles.display.edit.movie',
                    'biography'                         =>  'roles.display.edit.biography',
                    'director'                          =>  'roles.display.edit.director',
                    'actor'                             =>  'roles.display.edit.actor',
                    'studio'                            =>  'roles.display.edit.studio',
                    'director_movie_relationship'       =>  'roles.display.edit.dm_rel',
                    'genre'
                ],

            ],
            /* -------- Descriptions -------- */
            'description'   =>  [

                'delete'    =>  [
                    'user'                              =>  'roles.description.delete.user',
                    'Permission'                        =>  'roles.description.delete.Role',
                    'role'                              =>  'roles.description.delete.role',
                    'movie'                             =>  'roles.description.delete.movie',
                    'biography'                         =>  'roles.description.delete.biography',
                    'director'                          =>  'roles.description.delete.director',
                    'actor'                             =>  'roles.description.delete.actor',
                    'studio'                            =>  'roles.description.delete.studio',
                    'director_movie_relationship'       =>  'roles.description.delete.dm_rel',
                    'genre'

                ],
                'create'    =>  [
                    'user'                              =>  'roles.description.create.user',
                    'Permission'                        =>  'roles.description.create.Role',
                    'role'                              =>  'roles.description.create.role',
                    'movie'                             =>  'roles.description.create.movie',
                    'biography'                         =>  'roles.description.create.biography',
                    'director'                          =>  'roles.description.create.director',
                    'actor'                             =>  'roles.description.create.actor',
                    'studio'                            =>  'roles.description.create.studio',
                    'director_movie_relationship'       =>  'roles.description.create.dm_rel',
                    'genre'
                ],
                'edit'      =>  [
                    'user'                              =>  'roles.description.edit.user',
                    'Permission'                        =>  'roles.description.edit.Role',
                    'role'                              =>  'roles.description.edit.role',
                    'movie'                             =>  'roles.description.edit.movie',
                    'biography'                         =>  'roles.description.edit.biography',
                    'director'                          =>  'roles.description.edit.director',
                    'actor'                             =>  'roles.description.edit.actor',
                    'studio'                            =>  'roles.description.edit.studio',
                    'director_movie_relationship'       =>  'roles.description.edit.dm_rel',
                    'genre'
                ],

            ]
        ];
    }

    public static function getPermissionTranslations()
    {
        return [
            /* -------- Permission Names -------- */
            'name'          =>  [

                'delete'    =>  [
                    'user'                              =>  'permissions.name.delete.user',
                    'permission'                        =>  'permissions.name.delete.permission',
                    'role'                              =>  'permissions.name.delete.role',
                    'movie'                             =>  'permissions.name.delete.movie',
                    'biography'                         =>  'permissions.name.delete.biography',
                    'director'                          =>  'permissions.name.delete.director',
                    'actor'                             =>  'permissions.name.delete.actor',
                    'studio'                            =>  'permissions.name.delete.studio',
                    'director_movie_relationship'       =>  'permissions.name.delete.dm_rel',
                    'genre'                             =>  'permissions.name.delete.genre',
                ],
                'create'    =>  [
                    'user'                              =>  'permissions.name.create.user',
                    'permission'                        =>  'permissions.name.create.permission',
                    'role'                              =>  'permissions.name.create.role',
                    'movie'                             =>  'permissions.name.create.movie',
                    'biography'                         =>  'permissions.name.create.biography',
                    'director'                          =>  'permissions.name.create.director',
                    'actor'                             =>  'permissions.name.create.actor',
                    'studio'                            =>  'permissions.name.create.studio',
                    'director_movie_relationship'       =>  'permissions.name.create.dm_rel',
                    'genre'                             =>  'permissions.name.create.genre',
                ],
                'edit'      =>  [
                    'user'                              =>  'permissions.name.edit.user',
                    'permission'                        =>  'permissions.name.edit.permission',
                    'role'                              =>  'permissions.name.edit.role',
                    'movie'                             =>  'permissions.name.edit.movie',
                    'biography'                         =>  'permissions.name.edit.biography',
                    'director'                          =>  'permissions.name.edit.director',
                    'actor'                             =>  'permissions.name.edit.actor',
                    'studio'                            =>  'permissions.name.edit.studio',
                    'director_movie_relationship'       =>  'permissions.name.edit.dm_rel',
                    'genre'                             =>  'permissions.name.edit.genre',
                ],

            ],

            /* -------- Display Names -------- */
            'display_name'  =>  [

                'delete'    =>  [
                    'user'                              =>  'permissions.display.delete.user',
                    'permission'                        =>  'permissions.display.delete.permission',
                    'role'                              =>  'permissions.display.delete.role',
                    'movie'                             =>  'permissions.display.delete.movie',
                    'biography'                         =>  'permissions.display.delete.biography',
                    'director'                          =>  'permissions.display.delete.director',
                    'actor'                             =>  'permissions.display.delete.actor',
                    'studio'                            =>  'permissions.display.delete.studio',
                    'director_movie_relationship'       =>  'permissions.display.delete.dm_rel',
                    'genre'                             =>  'permissions.display.delete.genre',

                ],
                'create'    =>  [
                    'user'                              =>  'permissions.display.create.user',
                    'permission'                        =>  'permissions.display.create.permission',
                    'role'                              =>  'permissions.display.create.role',
                    'movie'                             =>  'permissions.display.create.movie',
                    'biography'                         =>  'permissions.display.create.biography',
                    'director'                          =>  'permissions.display.create.director',
                    'actor'                             =>  'permissions.display.create.actor',
                    'studio'                            =>  'permissions.display.create.studio',
                    'director_movie_relationship'       =>  'permissions.display.create.dm_rel',
                    'genre'
                ],
                'edit'      =>  [
                    'user'                              =>  'permissions.display.edit.user',
                    'permission'                        =>  'permissions.display.edit.permission',
                    'role'                              =>  'permissions.display.edit.role',
                    'movie'                             =>  'permissions.display.edit.movie',
                    'biography'                         =>  'permissions.display.edit.biography',
                    'director'                          =>  'permissions.display.edit.director',
                    'actor'                             =>  'permissions.display.edit.actor',
                    'studio'                            =>  'permissions.display.edit.studio',
                    'director_movie_relationship'       =>  'permissions.display.edit.dm_rel',
                    'genre'
                ],

            ],
            /* -------- Descriptions -------- */
            'description'   =>  [

                'delete'    =>  [
                    'user'                              =>  'permissions.description.delete.user',
                    'permission'                        =>  'permissions.description.delete.permission',
                    'role'                              =>  'permissions.description.delete.role',
                    'movie'                             =>  'permissions.description.delete.movie',
                    'biography'                         =>  'permissions.description.delete.biography',
                    'director'                          =>  'permissions.description.delete.director',
                    'actor'                             =>  'permissions.description.delete.actor',
                    'studio'                            =>  'permissions.description.delete.studio',
                    'director_movie_relationship'       =>  'permissions.description.delete.dm_rel',
                    'genre'

                ],
                'create'    =>  [
                    'user'                              =>  'permissions.description.create.user',
                    'permission'                        =>  'permissions.description.create.permission',
                    'role'                              =>  'permissions.description.create.role',
                    'movie'                             =>  'permissions.description.create.movie',
                    'biography'                         =>  'permissions.description.create.biography',
                    'director'                          =>  'permissions.description.create.director',
                    'actor'                             =>  'permissions.description.create.actor',
                    'studio'                            =>  'permissions.description.create.studio',
                    'director_movie_relationship'       =>  'permissions.description.create.dm_rel',
                    'genre'
                ],
                'edit'      =>  [
                    'user'                              =>  'permissions.description.edit.user',
                    'permission'                        =>  'permissions.description.edit.permission',
                    'role'                              =>  'permissions.description.edit.role',
                    'movie'                             =>  'permissions.description.edit.movie',
                    'biography'                         =>  'permissions.description.edit.biography',
                    'director'                          =>  'permissions.description.edit.director',
                    'actor'                             =>  'permissions.description.edit.actor',
                    'studio'                            =>  'permissions.description.edit.studio',
                    'director_movie_relationship'       =>  'permissions.description.edit.dm_rel',
                    'genre'
                ],

            ]
        ];
    }

}