<?php namespace Ske\Parsing\Url;

/**
 * SIKessEm URL parser interface
 * 
 * @package sikessem/parsing-url
 * @version 1.0.0-dev
 * @author SIGUI Kessé Emmanuel
 * @license MIT License
 */
interface UrlParser
{
    /**
     * Parse the parser url
     * 
     * @param int $flags Parsing flags
     * @return mixed
     */
    public function parse(int $flags = -1): UrlParsed;
}