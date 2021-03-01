<?php namespace Ske;

/**
 * The application class
 */
class App
{
    /**
     * Create a new application
     * 
     * @param string $path The application system
     */
    public function __construct(Sys $sys)
    {
        $this->sys = $sys;
    }

    /**
     * @var namespace\Sys The application system
     */
    protected Sys $sys;

    /**
     * @return namespace\Sys The application system
     */
    public function sys(): Sys
    {
        return $sys;
    }

    public function run()
    {
        $sys = $this->sys;

        switch ($url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
        {
            case '/':
                $module = 'Home';
                $action = 'index';
                break;
            
            default:
                $module = 'ErrorDocument';
                $action = 'error404';
                break;
        }
        
        $src = new Src($this->sys->dir() . 'src');
        $src->getFile($module . '.php');
        
        $module_class = 'App\\' . $module;
        $module_object = new $module_class;
        
        $module_object->$action();
    }
}