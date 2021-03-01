<?php namespace Sikessem;

/**
 * The source class
 */
class Src extends Inc
{
    /**
     * Include the source file
     * 
     * @return mixed The value returned by the included file or false
     */
    public function load()
    {
        foreach(explode(PATH_SEPARATOR, $this->path) as $path)
            if(is_file($file = $path . DIRECTORY_SEPARATOR . $this->file))
                return require_once $file;
        return false;
    }
}