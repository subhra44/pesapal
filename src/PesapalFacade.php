<?php

namespace Subhra\Pesapal;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Subhra\Pesapal\Skeleton\SkeletonClass
 */
class PesapalFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pesapal';
    }
}
