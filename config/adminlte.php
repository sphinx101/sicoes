<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'SiCoES',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>SiCo</b>Es',
    'logo_img' => 'img/logo/sce.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Sicoes',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info',
    'usermenu_image' => true,
    'usermenu_desc' => false,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => 'bg-info',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-info',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => 'navbar-info',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-info elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-info navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
    |
    */

    'enabled_laravel_mix' => true,
    'laravel_mix_css_path' => 'css/sicoes.css',
    'laravel_mix_js_path' => 'js/sicoes.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [
        [
            'header'  => 'ALUMNO',
            'role'    => ['docente', 'director'],
        ],
        [
            'text'        => 'Listar',
            'url'         => '#',
            'icon'        => 'fas fa-sort-alpha-down',
            'role'        => ['docente'],
        ],
        [
            'text'        => 'Asistencia',
            'url'         => '#',
            'icon'        => 'fas fa-tasks',
            'role'        => ['docente']
        ],
        [
            'text'        => 'Calificaciones',
            'icon'        => 'fas fa-edit',
            'role'        => ['director', 'docente', 'administrativo', 'alumno'],
            'submenu'     => [
                [
                    'text'  => 'Registro',
                    'icon'  => 'fas fa-file-alt',
                    'url'   => '#',
                    'role'  => ['docente']
                ],
                [
                    'text'  => 'Concentrado',
                    'icon'  => 'fas fa-newspaper',
                    'url'   => '#',
                    'role'  => ['director', 'docente', 'administrativo']

                ],
                [
                    'text'  => 'Concentrado Alumno',
                    'icon'  => 'fas fa-id-badge',
                    'url'   => '#',
                    'role'  => ['director', 'docente', 'administrativo', 'alumno']
                ]
            ]

        ],
        [
            'text'        => 'Registrar Padre/Tutor',
            'url'         => '#',
            'icon'        => 'fas fa-user-friends',
            'role'        => ['docente']
        ],
        [
            'header'  => 'DOCENTE',
            'role'    => ['director', 'supervisor'],
        ],
        [
            'text' => 'Registrar Docente',
            'route' => 'docentes.create',
            //'url'         => '#',
            'icon' => 'fas fa-user-plus',
            'role' => ['supervisor', 'director']
        ],
        [
            'text' => 'Datos Generales',
            //'route'  => "docentes.index",
            'url'         => '#',
            'icon' => 'fas fa-id-card',
            'role' => ['director', 'supervisor']
        ],
        [
            'text' => 'Aulas Asignadas',
            //'route'  => 'aula.index',
            'url'         => '#',
            'icon' => 'fas fa-list-ol',
            //'url' => '#',
            'role' => ['director', 'administrativo']
        ],
        [
            'text' => 'Docentes por Escuela',
            //'route'=>'docentes.xct.listar',
            'url'         => '#',
            'icon' => 'fas fa-home',
            'role' => ['supervisor', 'administrativo'],
        ],
        [   //'role' => 'director',
            'text'    => 'Multilevel',
            'icon'    => 'share',

            'submenu' => [
                [
                    'text' => 'Level One',
                    'url'  => '#',
                    //'role' => 'director',
                ],
                [
                    'text'    => 'Level One',
                    'url'     => '#',
                    //'role' => 'director',
                    'submenu' => [
                        [
                            'text' => 'Level Two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'Level Two',
                            'url'     => '#',
                            //'role' => 'director',
                            'submenu' => [
                                [
                                    'text' => 'Level Three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'Level Three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'Level One',
                    'url'  => '#',
                ],
            ],
        ],
        [
            'header'  => 'INSCRIPCION',
            'role'    => ['director', 'administrativo'],
        ],
        [
            'text'      => 'Alumno',
            'icon'      => 'fas fa-user-graduate',
            'role'      => ['director', 'administrativo'],
            'submenu'   => [
                [
                    'text'       => 'Pre-Inscripcion',
                    'icon'       => 'fas fa-user-plus',
                    //'route'        => 'alumnos.create',
                    'url'         => '#',
                    'role'       => ['director', 'administrativo'],
                ],
                [
                    'text'       => 'Inscripcion',
                    'icon'       => 'fas fa-graduation-cap',
                    'url'        => '#',
                    'role'       => ['director', 'administrativo']
                ],
            ],
        ],
        [
            'text'      => 'Reportes Alumnos',
            'icon'      => 'fas fa-user-graduate',
            'role'      => ['director', 'administrativo'],
            'submenu'   => [
                [
                    'text'       => 'Pre-Inscritos',
                    'icon'       => 'fas fa-sort-alpha-down',
                    // 'route' => 'alumnos.index',
                    'url'         => '#',
                    'role'       => ['director', 'administrativo'],
                ],
                [
                    'text'       => 'Inscritos',
                    'icon'       => 'fas fa-sort-alpha-down',
                    'url'        => '#',
                    'role'       => ['director', 'administrativo'],
                ],
                [
                    'text'       => 'Sin Inscripcion',
                    'icon'       => 'fas fa-sort-alpha-down',
                    'url'        => '#',
                    'role'       => ['director', 'administrativo'],
                ],
            ],
        ],



    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
    |
    */

    'filters' => [
        //JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,

        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        App\Filter\MenuFilterRole::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];
