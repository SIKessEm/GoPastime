<?php namespace Ske;

/**
 * The system class
 */
class Sys
{
    /**
     * @var array The list of the invalid dir values
     */
    public const INVALID_ROOT_VALUES = ['.', '..'];

    /**
     * @var int The invalid dir error type
     */
    public const INVALID_ROOT_ERROR = 0x01;

    /**
     * Create a new system
     * 
     * @param string $dir The system root directory
     * @param array $cfg The ystem configuration options
     */
    public function __construct(string $dir, array $cfg = [])
    {
        if(empty($dir))
            throw new \InvalidArgumentException('Empty directory given', self::INVALID_ROOT_ERROR);
            
        if(in_array($dir, self::INVALID_ROOT_VALUES))
            throw new \InvalidArgumentException('Cannot use "' . $dir . '" as directory', self::INVALID_ROOT_ERROR);
        
        if(!is_dir($dir))
            throw new \InvalidArgumentException('No such directory "' . $dir . '"', self::INVALID_ROOT_ERROR);
            
        $dir = realpath($dir) . DIRECTORY_SEPARATOR;
        $this->dir = $dir;

        $this->cfg = $cfg;
    }

    /**
     * @var string The system dir directory
     */
    protected string $dir;

    /**
     * Get the system dir directory 
     *
     * @return string The system dir directory
     */
    public function dir(): string
    {
        return $this->dir;
    }

    /**
     * @var array $cfg The system configuration options
     */
    protected array $cfg;

    /**
     * Get a system component
     */
    public function __get(string $name)
    {
        switch($name)
        {
            case 'src':
                $opt = new Src($this->dir . $this('inc.src_path'));
                break;

            case 'tpl':
                $opt = new Tpl($this->dir . $this('inc.tpl_path'));
                break;

            default:
                $opt = null;
                break;
        }

        return $opt;
    }

    /**
     * Call the system configuration
     * 
     * @param string $args The system configuration option index
     * @return mixed The system configuration options values
     */
    public function __invoke(...$args)
    {
        $cfg = [];

        foreach($args as $index)
            $cfg[$index] = $this->cfg[$index] ?? null;

        if(count($cfg) === 1)
            $cfg = $cfg[array_key_first($cfg)];
        
        return $cfg;
    }
}