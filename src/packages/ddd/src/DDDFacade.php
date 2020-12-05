<?php

namespace Wulfheart\DDD;

use Illuminate\Support\Facades\Facade;


class DDDFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ddd';
    }
}
