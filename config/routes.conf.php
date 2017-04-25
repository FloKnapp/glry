<?php

return [

    // Frontend

    'home' => [
        'path'       => '/',
        'controller' => \Glry\Controller\SiteController::class,
        'action'     => 'index',
        'method'     => ['GET'],
    ],
    'user_login' => [
        'path'       => '/user/login',
        'controller' => \Glry\Controller\UserController::class,
        'action'     => 'login',
        'method'     => ['GET', 'POST'],
    ],
    'user_logout' => [
        'path'       => '/user/logout',
        'controller' => \Glry\Controller\UserController::class,
        'action'     => 'logout',
        'method'     => ['GET']
    ],

    // Backend

    'admin_home' => [
        'path'       => '/admin',
        'controller' => \Glry\Controller\AdminController::class,
        'action'     => 'index',
        'method'     => ['GET']
    ],
    'admin_category' => [
        'path'       => '/admin/category',
        'controller' => \Glry\Controller\AdminController::class,
        'action'     => 'category',
        'method'     => ['GET'],
        'title'      => 'Kategorien'
    ],
    'admin_layout_settings' => [
        'path'       => '/admin/layout',
        'controller' => \Glry\Controller\AdminController::class,
        'action'     => 'layoutSettings',
        'method'     => ['GET'],
        'title'      => 'Layout'
    ],
    'admin_user_management' => [
        'path'       => '/admin/users',
        'controller' => \Glry\Controller\AdminController::class,
        'action'     => 'userManagement',
        'method'     => ['GET'],
        'title'      => 'Nutzer verwalten'
    ],
    'admin_user_add' => [
        'path'       => '/admin/user/add',
        'controller' => \Glry\Controller\AdminController::class,
        'action'     => 'userAdd',
        'method'     => ['GET', 'POST']
    ],
    'admin_user_edit' => [
        'path'       => '/admin/user/edit/(\d+)',
        'controller' => \Glry\Controller\AdminController::class,
        'action'     => 'userEdit',
        'method'     => ['GET']
    ],
    'admin_user_permission' => [
        'path'       => '/admin/user/permission/(\d+)',
        'controller' => \Glry\Controller\AdminController::class,
        'action'     => 'userPermission',
        'method'     => ['GET']
    ],
    'admin_user_delete' => [
        'path'       => '/admin/user/delete/(\d+)',
        'controller' => \Glry\Controller\AdminController::class,
        'action'     => 'userDelete',
        'method'     => ['GET']
    ]

];