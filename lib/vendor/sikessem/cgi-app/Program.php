<?php namespace Ske\Cgi;
/**
 * SIKessEm CGI Application program class
 * 
 * @package sikessem/cgi-app
 * @license MIT
 * @author SIGUI Kessé Emmanuel
 */
abstract class Program extends \Ske\Program
{
    /**
     * The CGI program handler
     * 
     * @param string $base The request url base
     * @return void
     */
    abstract public function main(string $base = ''): void;
}