<?php namespace Ske\Parsing\Url;

/**
 * SIKessEm URL parsable class
 * 
 * @package sikessem/parsing-url
 * @version 1.0.0-dev
 * @author SIGUI Kessé Emmanuel
 * @license MIT License
 */
class UrlParsable implements UrlParser
{
    /**
     * Create a new parsable URL
     * 
     * @param string $url The url to parse
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @var string The url to parse
     */
    protected string $url;

    /**
     * Parse the url
     * 
     * @param string $url The url to parse
     * @param int $flags Parsing flags
     * @return namespace\UrlParsed
     */
    public function parse(int $flags = -1): UrlParsed
    {
        return new UrlParsed(parse_url($this->url, $flags));
    }
}