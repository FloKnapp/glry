<?php

return [
    'namespacePrefix' => 'Glry',
    'projectRoot'     => __DIR__ . '/..',
    'applicationRoot' => __DIR__ . '/../src',
    'viewsRoot'       => __DIR__ . '/../templates',
    'routes'          => require_once __DIR__ . '/../config/routes.conf.php',
    'db'              => [
        'type'     => 'mysql',
        'name'     => 'glry',
        'username' => 'glry',
        'password' => 'glry',
        'host'     => 'localhost'
    ],
    'auth' => [
        'authUrl'     => '/user/login',
        'registerUrl' => '/user/register',
        'authEntity'  => \Glry\Entity\UserEntity::class
    ],
];