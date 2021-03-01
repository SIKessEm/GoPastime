<?php namespace Sikessem;

/**
 * The source class
 */
class Src extends Inc
{
    /**
     * Create a new source
     * 
     * @param string $path The source path
     */
    public function __construct(string $path)
    {
        parent::__construct($path, true);
    }
}