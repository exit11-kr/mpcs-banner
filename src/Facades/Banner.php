<?php

namespace Exit11\Banner\Facades;

use Illuminate\Support\Facades\Facade;

class Banner extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Exit11\Banner\Banner::class;
    }
}
