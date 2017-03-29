<?php

require_once __DIR__.'/config/bootstrap.php';

$app['console']->add(new Griff\Services\Cryptocurrency());
$app['console']->run();
