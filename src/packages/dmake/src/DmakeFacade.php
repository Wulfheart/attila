<?php

namespace Wulfheart\Dmake;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wulfheart\Dmake\Skeleton\SkeletonClass
 */
class DmakeFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dmake';
    }
}
