<?php
use System\CgiProgram as Program;

$base = '';

$root = dirname(__DIR__);

$sys = require_once $root . DIRECTORY_SEPARATOR . 'sys.php';

$program = new Program($root, $sys);

$program->main($base);