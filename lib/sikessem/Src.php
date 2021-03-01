<?php namespace Ske;

/**
 * The source class
 */
class Src extends Inc
{
    /**
     * Create a new source
     * 
     * @param string $path The source path
     * @param string $ns The source namespace
     * @param array $exts The source extensions list
     */
    public function __construct(string $path, string $ns, $exts)
    {
        parent::__construct($path, true);
        $this->ns = $ns;
        $this->exts = $exts;
    }

    /**
     * @var string $ns The source namespace
     */
    protected string $ns;

    /**
     * @var array $exts The source extensions list
     */
    protected array $exts;

    public function getClass(string $name, string $alias = '')
    {
        foreach ($this->exts as $ext)
        {
            if($this->getFile($name . $ext))
            {
                if(class_exists($class = $this->ns . '\\' . $name))
                {
                    if(!empty($alias))
                        class_alias($class, $alias, false);
                    return $class;
                }
            }
        }
    }

    public function getObject(string $name, array $args = [])
    {
        if($class = $this->getClass($name))
            return new $class(...$args);
    }
}