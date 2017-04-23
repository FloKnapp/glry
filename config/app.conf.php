<?php

return [
    'namespacePrefix' => 'Glry',
    'projectRoot'     => __DIR__ . '/..',
    'applicationRoot' => __DIR__ . '/../src',
    'viewsRoot'       => __DIR__ . '/../templates',
    'routes'          => require_once __DIR__ . '/../config/routes.conf.php'
];