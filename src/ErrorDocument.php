<?php namespace App;

class ErrorDocument extends \Ske\Module
{
    public function error404()
    {
        echo 'Error 404';
    }
}