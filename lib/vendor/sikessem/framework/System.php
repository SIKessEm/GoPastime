<?php namespace Ske;
/**
 * The SIKessEm framework system class
 * 
 * @package sikessem/framework
 * @license MIT
 * @author SIGUI Kessé Emmanuel
 */
class System
{
    /**
     * Create a new system
     * 
     * @param array $options System options list
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @var array $options System options list
     */
    protected array $options;

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