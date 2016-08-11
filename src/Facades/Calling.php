<?php

namespace Revolution\Calling\Facades;

use Illuminate\Support\Facades\Facade;

class Calling extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Revolution\Calling\Calling::class;
    }
}
