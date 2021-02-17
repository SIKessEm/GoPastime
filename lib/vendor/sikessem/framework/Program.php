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
        if(empty($root))
            throw new \InvalidArgumentException('Empty directory given', self::INVALID_ROOT_ERROR);
            
        if(in_array($root, self::INVALID_ROOT_VALUES))
            throw new \InvalidArgumentException('Cannot use "' . $root . '" as directory', self::INVALID_ROOT_ERROR);
        
        if(!is_dir($root))
            throw new \InvalidArgumentException('No such directory "' . $root . '"', self::INVALID_ROOT_ERROR);
            
        $this->root = $root;
        $this->options = $options;
    }

    /**
     * @var string The program root directory
     */
    protected string $root;

    /**
     * @return string The program root directory
     */
    public function root(): string
    {
        return $this->root;
    }

    /**
     * @var array $options System options list
     */
    protected array $options;

    /**
     * The framework program handler
     * 
     * @return void
     */
    abstract public function main(): void;

    /**
     * Call the system options
     * 
     * @param string $args The system option index
     * @return mixed The option index value
     */
    public function __invoke(...$args)
    {
        $data = [];

        foreach($args as $index)
            $data[$index] = $this->options[$index] ?? null;

        if(count($data) === 1)
            $data = $data[array_key_first($data)];
        
        return $data;
    }
}