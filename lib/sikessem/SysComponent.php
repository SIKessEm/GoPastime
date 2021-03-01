<?php namespace Ske;

/**
 * The system component class
 */
abstract class SysComponent
{
    /**
     * Create a new system component
     * 
     * @param namespace\Sys $sys The component system
     */
    public function __construct(Sys $sys)
    {
        $this->sys = $sys;
    }

    /**
     * @var namespace\Sys $sys The component system
     */
    protected Sys $sys;

    /**
     * Get the component system
     * 
     * @var namespace\Sys $sys The component system
     */
    public function sys(): Sys
    {
        return $this->sys;
    }
}