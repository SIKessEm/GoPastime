<?php namespace Ske\Web;

use Ske\Parsing\Url\UrlParsable;

/**
 * SIKessEm Request URL class
 * 
 * @package sikessem/web-tools
 * @version 1.0.0-dev
 * @author SIGUI Kessé Emmanuel
 * @license MIT License
 */
class RequestUrl extends UrlParsable
{
    public function __construct()
    {
        parent::__construct($_SERVER['REQUEST_URI']);
    }
}
