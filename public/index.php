<?php

require_once __DIR__ . '/../vendor/autoload.php';

$sessionManager = new \Faulancer\Session\SessionManager();
$sessionManager->startSession();

$request = new \Faulancer\Http\Request();
$request->createFromHeaders();

$config = new \Faulancer\Service\Config();
$config->set(require_once __DIR__ . '/../config/app.conf.php');

$kernel = new \Faulancer\Kernel($request, $config);
echo $kernel->run();