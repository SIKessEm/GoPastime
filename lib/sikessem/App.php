<?php namespace Ske;

/**
 * The application class
 */
class App extends SysComponent
{
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
        
        $sys->src->getObject($module, [$sys])->$action();
    }
}