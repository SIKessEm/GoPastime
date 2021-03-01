<?php namespace Ske;

/**
 * The template class
 */
class Tpl extends Inc
{
    /**
     * Create a new template
     * 
     * @param string $path The template path
     */
    public function __construct(string $path)
    {
        parent::__construct($path, false);
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