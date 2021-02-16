<?php namespace System;

use Ske\Parsing\{
    Url\UrlParsable,
    Query\QueryParsable
};

class CgiProgram extends \Ske\System\CgiProgram
{
    public function main(string $base = ''): void
    {
        $url = (new UrlParsable($_SERVER['REQUEST_URI']))->parse();
        $query = (new QueryParsable($url->query))->parse();

        switch($path = $url->path)
        {
            case $base . '/':
                exit('Welcome to CGI home !');
                break;

            default:
                echo 'Document not found at "' . $path . '".';
                exit(1);
                break;
        }
    }
}