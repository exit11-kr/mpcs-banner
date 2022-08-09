<?php

namespace Mpcs\Banner\Facades;

use Illuminate\Support\Facades\Facade;

class Banner extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mpcs\Banner\Banner::class;
    }
}
