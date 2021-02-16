<?php namespace SIKessEm;

/**
 * SIKessEm parsing interface
 * 
 * @package sikessem/parsing
 * @version 1.0.0
 * @author SIGUI Kessé Emmanuel
 * @license MIT License
 */
interface Parsable
{
    /**
     * Parse a source
     * 
     * @param mixed $source The source to parse
     * @param null|int $options Parsing options
     * @return mixed
     */
    public function parse($source, ?int $options = null);
}