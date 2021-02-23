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
    public function __construct(string $root, array $options = [])
    {
        if(empty($root))
            throw new \InvalidArgumentException('Empty directory given', self::INVALID_ROOT_ERROR);
            
        if(in_array($root, self::INVALID_ROOT_VALUES))
            throw new \InvalidArgumentException('Cannot use "' . $root . '" as directory', self::INVALID_ROOT_ERROR);
        
        if(!is_dir($root))
            throw new \InvalidArgumentException('No such directory "' . $root . '"', self::INVALID_ROOT_ERROR);
            
        $this->root = $root;
        $this->configure($options);
    }

    /**
     * @var string The program root directory
     */
    protected string $root;

    /**
     * Get the program root directory 
     *
     * @return string The program root directory
     */
    public function root(): string
    {
        return $this->root;
    }

    protected function configure(array $options): self
    {
        $this->options = $options;
        return $this;
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