<?php

require_once __DIR__ . '/src/vendor/autoload.php';

return (array) parse_ini_file(__DIR__ . '/sys.ini', false, INI_SCANNER_TYPED);