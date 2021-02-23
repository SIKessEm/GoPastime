<?php namespace Ske;
/**
 * The SIKessEm framework program class
 * 
 * @package sikessem/framework
 * @license MIT
 * @author SIGUI Kessé Emmanuel
 */
abstract class Program
{
    /**
     * Create a new program
     * 
     * @param string The program root directory
     * @param array $options System options list
     * @throws \InvalidArgumentException If the root given is invalid
     */
    public function __construct(string $root, array $options = [])
    {
        $this->sys = new System($root, $options);
    }

    /**
     * @var namespace\System $sys The program system
     */
    protected System $sys;

    /**
     * Get the program system
     * 
     * @var namespace\System $sys The program system
     */
    public function system(): System
    {
        return $this->sys;
    }

    /**
     * The framework program handler
     * 
     * @return void
     */
    abstract public function main(): void;
}