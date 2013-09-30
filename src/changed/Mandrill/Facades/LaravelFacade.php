<?php namespace ScubaClick\Mandrill\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
    	return 'mandrill';
    }
}
