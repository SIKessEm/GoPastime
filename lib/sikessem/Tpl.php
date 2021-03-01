<?php namespace Sikessem;

/**
 * The template class
 */
class Tpl extends Inc
{
    /**
     * Create a new template
     * 
     * @param string $path The template path
     * @param string $file The template file
     * @param array $data The template data
     */
    public function __construct(string $file, string $path, array $data = [])
    {
        parent::__construct($file, $path);
        $this->data = $data;
    }

    /**
     * @var array The template data
     */
    protected array $data;

    /**
     * @var string The secure file
     */
    protected string $secure_file;

    /**
     * Include the template file
     * 
     * @return mixed The value returned by the included file or false
     */
    public function load()
    {
        foreach(explode(PATH_SEPARATOR, $this->path) as $path)
            if(is_file($this->secure_file = $path . DIRECTORY_SEPARATOR . $this->file))
                return $this->load_secure_file();
        return false;
    }

    /**
     * Include the secure file
     * 
     * @return mixed The value returned by the included file
     */
    public function load_secure_file()
    {
        extract($this->data);
        return require_once $this->secure_file;
    }

    /**
     * Save the template to string
     * 
     * @param callable $callback An optional callback function
     * @param int $chunk_size The callback chunck size
     * @return null|string The template render
     */
    public function save(callable $callback = null, int $chunk_size = 0): ?string
    {
        ob_start($callback, $chunk_size, PHP_OUTPUT_HANDLER_CLEANABLE|PHP_OUTPUT_HANDLER_REMOVABLE);
        if($this->load() === false)
            return null;
        return ob_get_clean();
    }
}