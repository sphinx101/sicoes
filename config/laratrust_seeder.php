<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        /*'superadministrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u',
        ],
        'role_name' => [
            'module_1_name' => 'c,r,u,d',
        ]*/
        'root' => [
            'supervisor'        => 'c,r,u,d',
            'director'          => 'c,r,u,d',
            'docente'           => 'c,r,u,d',
            'administrativo'    => 'c,r,u,d',
            'alumno'            => 'c,r,u,d',
            'perfil'            => 'c,r,u,d'
        ],
        'supervisor' => [
            'director'          => 'c,r,u,d',
            'docente'           => 'c,r,u,d',
            'administrativo'    => 'c,r,u,d',

        ],
        'director' => [
            'docente'           => 'r,u',
            'administrativo'    => 'r,u',
            'alumno'            => 'c,r,u,d',
            'perfil'            => 'c,r,u,d'
        ],
        'docente'  => [
            'alumno'            => 'r,u',
            'perfil'            => 'r,u'
        ],
        'administrativo' => [
            'docente'           => 'r,u',
            'alumno'            => 'c,r,u',
            'perfil'            => 'c,r,u,d'
        ],
        'alumno' => [
            'perfil'            => 'r,u'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
