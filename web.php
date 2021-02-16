<?php
use System\CgiProgram as Program;

$sys = require_once __DIR__ . '/sys.php';

return new Program(__DIR__, $sys);