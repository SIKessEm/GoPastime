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
     * @var array The list of the invalid root values
     */
    public const INVALID_ROOT_VALUES = ['.', '..'];

    /**
     * @var int The invalid root error type
     */
    public const INVALID_ROOT_ERROR = 0x01;

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