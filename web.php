<?php
use System\CgiProgram as Program;

require_once __DIR__ . '/src/vendor/autoload.php';

return new Program(__DIR__, require_once __DIR__ . '/sys.php');