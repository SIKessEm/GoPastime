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
     * @param array $exts The source file extensions
     */
    public function __construct(string $path, string $ns, $exts)
    {
        parent::__construct($path, $exts, true);
        $this->ns = $ns;
    }

    /**
     * @var string $ns The source namespace
     */
    protected string $ns;

    public function getClass(string $name, string $alias = '', array $data = [])
    {
        if($this->getFile(str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $name), $data))
        {
            if(class_exists($class = $this->ns . '\\' . str_replace('/', '\\', $name)))
            {
                if(!empty($alias))
                    class_alias($class, $alias, false);
                return $class;
            }
        }
    }

    public function getObject(string $name, array $args = [], string $alias = '', array $data = [])
    {
        if($class = $this->getClass($name, $alias, $data))
            return new $class(...$args);
    }
}