<?php

require_once __DIR__ . '/../app/bootstrap.php.cache';
require_once __DIR__ . '/../app/AppKernel.php';

use Symfony\Component\HttpFoundation\Request;

if (!file_exists($file = __DIR__ . '/../app/config/local/parameters.yml')) {
    copy(__DIR__ . '/../app/config/local/parameters.yml.dist', $file);
}
if (!file_exists($file = __DIR__ . '/../app/config/local/pluging/routing.yml')) {
    touch($file);
}
$kernel = new AppKernel('install', true); // put second parameter to false when development is done
$kernel->loadClassCache();
$kernel->handle(Request::createFromGlobals())->send();