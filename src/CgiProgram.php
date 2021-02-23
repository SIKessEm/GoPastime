<?php namespace App;

use Ske\Parsing\{
    Url\UrlParsable,
    Query\QueryParsable
};

class CgiProgram extends \Ske\Cgi\Program
{
    public function main(string $base = ''): void
    {
        $url = (new UrlParsable($_SERVER['REQUEST_URI']))->parse();
        $query = (new QueryParsable($url->query))->parse();

        switch($path = $url->path)
        {
            case $base . '/':
                ob_start();
                $sys = $this->system();
                require_once $this->root . '/res/home.php';
                $content = ob_get_clean();
                exit($content);
                break;

            default:
                echo 'Document not found at "' . $path . '".';
                exit(1);
                break;
        }
    }
}