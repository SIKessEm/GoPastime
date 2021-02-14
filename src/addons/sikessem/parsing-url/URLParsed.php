<?php namespace Ske\Parsing\Url;

/**
 * SIKessEm URL parsed class
 * 
 * @package sikessem/parsing-url
 * @version 1.0.0-dev
 * @author SIGUI Kessé Emmanuel
 * @license MIT License
 */
class UrlParsed
{
    /**
     * Create a new parsed URL
     * 
     * @param array $info The url parsed info
     */
    public function __construct(array $info)
    {
        $this->info = $info;
    }

    /**
     * @var array $info The url parsed info
     */
    protected array $info;

    /**
     * Give the URL info
     * 
     * @param array $info The url parsed info
     * @param null|string $name The info index
     * @return mixed
     */
    public function info(?string $name = null)
    {
        return isset($name) ? ($this->info[$name] ?? null) : $this->info;
    }

    /**
     * Give the URL info value by index
     * 
     * @param string $name The info index
     * @return mixed
     */
    public function __get($name)
    {
        return $this->info($name);
    }
}
