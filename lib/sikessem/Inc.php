<?php namespace Sikessem;

/**
 * The include class
 */
abstract class Inc
{
    /**
     * Create a new include
     * 
     * @param string $file The include file
     * @param string $path The include path
     */
    public function __construct(string $file, string $path)
    {
        $this->file = $file;
        $this->setPath($path);
    }

    /**
     * @var string The include file
     */
    protected string $file;

    /**
     * @var string The include path
     */
    protected string $path;

    /**
     * Set the include path
     * 
     * @param string $path The new path
     * @return self
     */
    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Add a new path to the include
     * 
     * @param string $path The path to add
     * @return self
     */
    public function addPath(string $path): self
    {
        $this->path .= PATH_SEPARATOR . $path;
        return $this;
    }

    /**
     * Get the include path
     * 
     * @return string The include path
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Check if the include has path
     * 
     * @param string $path The path to check
     */
    public function hasPath(string $path): bool
    {
        $paths = explode(PATH_SEPARATOR, $this->path);
        return in_array($path, $path, true);
    }

    /**
     * Load the include file
     * 
     * @return mixed
     */
    abstract public function load();
}