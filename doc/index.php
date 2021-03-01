<?php
use Sikessem\{
    Res,
    Src,
    Tpl
};

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

$sys = require_once $root . 'sys.php';

switch ($url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
{
    case '/':
        $module = 'Home';
        $action = 'index';
        break;
    
    default:
        $module = 'ErrorDocument';
        $action = 'error404';
        break;
}

$src = new Src($module . '.php', $root . 'src');
$src->load();

$module_class = 'App\\' . $module;
$module_object = new $module_class;

$module_object->$action();

$tpl = new Tpl($root . 'tpl', 'jdhjj');