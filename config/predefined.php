<?php

function createMail($name) {
    $url    =  Config('app.url');
    if (starts_with($url, 'http://'))
    {
        $domain = substr ($url, 7); // $domain is now 'www.example.com'
          return $name.'@'.$domain;
    }
};

return [
    'users'     =>  [
        'amin'  =>  [
            'id'        =>  1,
            'email'     =>  createMail('mwangi_valentino@yahoo.com'),
            'password'  =>  'password'
        ],

        'john'  =>  [
            'id'        =>  2,
            'email'     =>  createMail('guest@gmail.com'),
            'password'  =>  'password'
        ],

        'annie' =>  [
            'id'        =>  3,
            'email'     =>  createMail('annie'),
            'password'  =>  'secret'
        ],

        'derpina'   => [
            'id'        =>  4,
            'email'     =>  createMail('derpina'),
            'password'  =>  'secret'
        ],
    ],

    'roles-and-perms'   => [
        'Roles'         => [
            'administrator',
            'contributor'
        ],
        'Permissions'   => [
            'delete'    =>  [
                'role',
                'roles',
                'permission',
                'permissions',
                'employee',
                'employees',
                'user',
                'users'
            ],
            'create'    =>  [
                'role',
                'roles',
                'permission',
                'permissions',
                'employee',
                'employees',
                'user',
                'users'
            ],
            'edit'      =>  [
                'role',
                'roles',
                'permission',
                'permissions',
                'employee',
                'employees',
                'user',
                'users'
            ],
            'read'      =>  [
                'role',
                'roles',
                'permission',
                'permissions',
                'employee',
                'employees',
                'user',
                'users'
            ]
        ],
        /**
         * Please note the plural and singular version of nouns in Permissions Array.
         */
        'Attachments'       =>  [
            'contributor'          =>  [
                'read-user',
                'edit-user',
                'delete-user',
                'create-user',
                'read-news'
            ],
            'administrator' =>  [
                'inherits'  =>  'contributor',
                'delete-role',
                'delete-roles',
                'delete-permission',
                'delete-permissions',
                'delete-employee',
                'delete-employees',
                'delete-users',
                'edit-users',
                'edit-role',
                'edit-roles',
                'edit-permission',
                'edit-permissions',
                'create-role',
                'create-roles',
                'create-permission',
                'create-permissions',
            ]
        ]
    ],

    'profiles'  =>  [
        'mwangi_valentino@yahoo.com'              =>  'administrator',
        'guest'                                   =>  'contributor'
    ],

    'defaults'  =>  [
        'role'  =>  'User'
    ]
];
