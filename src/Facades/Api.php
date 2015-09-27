<?php

namespace Rtransat\Hearthstone\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Api
 * @package Rtransat\Hearthstone\Facades
 */
class Api extends Facade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'hearthstone-api';
    }
}
