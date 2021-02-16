<?php namespace SIKessEm;

/**
 * SIKessEm formatting interface
 * 
 * @package sikessem/formatting
 * @version 1.0.0
 * @author SIGUI Kessé Emmanuel
 * @license MIT License
 */
interface Formattable
{
    /**
     * Format a resource
     * 
     * @param mixed $resource The resource to format
     * @param null|int $options Formatting options
     * @return mixed
     */
    public function format($resource, ?int $options = null);
}