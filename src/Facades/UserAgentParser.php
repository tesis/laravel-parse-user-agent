<?php

namespace Tesis\LaravelParseUserAgent\Facades;

use Illuminate\Support\Facades\Facade;

class UserAgentParser extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return 'useragentparser';
    }
}
