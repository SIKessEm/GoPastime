<?php namespace App;

class Home extends \Ske\Module
{
    public function index()
    {
        echo $this->sys->tpl->getRender('home');
    }
}