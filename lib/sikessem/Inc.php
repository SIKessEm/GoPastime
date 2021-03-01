<?php namespace Ske;

/**
 * The include class
 */
class Inc
{
    /**
     * Create a new include
     * 
     * @param string $path The include path
     * @param bool $once Include once
     * @param string $exts The file extensions
     */
    public function __construct(string $path, string $exts, bool $once)
    {
        $this->setPath($path);
        $this->exts = $exts;
        $this->once = $once;
    }

    /**
     * @var bool Include once
     */
    protected bool $once;

    /**
     * @var string $exts The file extensions
     */
    protected string $exts;

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
        return $this->setPath($this->getPath() . PATH_SEPARATOR . $path);
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
        return in_array($path, explode(PATH_SEPARATOR, $this->getPath()), true);
    }

    /**
     * Include a file
     * 
     * @param string $file The file to include
     * @return mixed The value returned by the included file or false
     */
    public function getFile(string $file, array $data = [])
    {
        foreach(explode(PATH_SEPARATOR, $this->getPath()) as $path)
        {
            foreach(array_map('trim', explode(',', $this->exts)) as $ext)
            {
                if(is_file($this->file_path = $path . DIRECTORY_SEPARATOR . $file . $ext))
                {
                    $this->file_data = $data;
                    return $this->get_secure_file();
                }
            }
        }
        return false;
    }

    /**
     * @var string The path of the file to include
     */
    protected string $file_path;

    /**
     * @var array The data of the file to include
     */
    protected array $file_data;

    /**
     * Include the secure file
     * @return mixed The value returned by the included file
     */
    protected function get_secure_file()
    {
        extract($this->file_data);
        $return = $this->once ? require_once $this->file_path : require $this->file_path;
        unset($this->file_data, $this->file_path);
        return $return;
    }
}