<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/config/bootstrap.php';

$app->get('/', 'Griff\CronController::index');

$request = Request::create('/', 'GET');

$app->run($request);
