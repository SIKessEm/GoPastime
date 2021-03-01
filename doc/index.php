<?php
use Ske\{
    Sys,
    App
};

$dir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
$opts = require_once $dir . 'sys.php';

$sys = new Sys($dir, $opts);
$app = new App($sys);
$app->run();