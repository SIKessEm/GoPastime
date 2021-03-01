<?php

switch ($url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
{
    case '/':
        die('Home page');
        break;
    
    default:
        die('Error 404');
        break;
}