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
     * @param array $exts The template file extensions
     */
    public function __construct(string $path, string $exts)
    {
        parent::__construct($path, $exts, false);
    }

    /**
     * Save the template to string
     * 
     * @param callable $callback An optional callback function
     * @param int $chunk_size The callback chunck size
     * @return null|string The template render
     */
    public function getRender(string $file, array $data = [], callable $callback = null, int $chunk_size = 0): ?string
    {
        ob_start($callback, $chunk_size, PHP_OUTPUT_HANDLER_CLEANABLE|PHP_OUTPUT_HANDLER_REMOVABLE);
        if($this->getFile($file, $data) === false)
            return null;
        return ob_get_clean();
    }
}