<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$serviceLocator = \Faulancer\ServiceLocator\ServiceLocator::instance();

/** @var \Faulancer\Session\SessionManager $sessionManager */
$sessionManager = $serviceLocator->get(\Faulancer\Service\SessionManagerService::class);
$sessionManager->startSession();

/** @var \Faulancer\Http\Request $request */
$request = $serviceLocator->get(\Faulancer\Service\RequestService::class);
$request->createFromHeaders();

/** @var \Faulancer\Service\Config $config */
$config = $serviceLocator->get(\Faulancer\Service\Config::class);
$config->set(require_once __DIR__ . '/../config/app.conf.php');

$kernel = new \Faulancer\Kernel($request, $config);
echo $kernel->run();