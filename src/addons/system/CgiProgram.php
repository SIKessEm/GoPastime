<?php namespace System;

class CgiProgram extends \Ske\System\CgiProgram
{
    public function main(string $base = ''): void
    {   
        switch ($url = $_SERVER['REQUEST_URI'])
        {
            case $base . '/':
                exit('Welcome to CGI home !');
                break;

            case $base . '/test':
                exit('Welcome to CGI test !');
                break;

            default:
                exit('Document not found (' . $url . ') !');
                break;
        }
    }
}