<?php

namespace Belvedere\LocalizedUrl;

use Illuminate\Support\Facades\Facade;

class LocalizedUrlFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'LocalizedUrl';
    }
}
