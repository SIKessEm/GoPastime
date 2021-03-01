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
        static $src, $tpl;

        $cfg = $this->cfg;

        switch($name)
        {
            case 'src':
                if(!isset($src))
                {
                    $src = new Src($this->dir . $cfg['src.dir'], $cfg['src.ns'], $cfg['src.exts']);
                    unset($cfg['src.dir'], $cfg['src.exts']);
                }
                return $src;

            case 'tpl':
                if(!isset($tpl))
                {
                    $tpl = new Tpl($this->dir . $cfg['tpl.dir'], $cfg['tpl.exts']);
                    unset($this->cfg['tpl.dir'], $cfg['tpl.exts']);
                }
                return $tpl;

            default: return null;
        }
    }

    /**
     * Call the system configuration
     * 
     * @param string $args The system configuration option index
     * @return mixed The system configuration options values
     */
    /*
    public function __invoke(...$args)
    {
        $cfg = [];

        foreach($args as $index)
            $cfg[$index] = $this->cfg[$index] ?? null;

        if(count($cfg) === 1)
            $cfg = $cfg[array_key_first($cfg)];
        
        return $cfg;
    }
    */
}