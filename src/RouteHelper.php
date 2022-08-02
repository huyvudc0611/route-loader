<?php
/**
 * User: HuyVu
 * Date: 02/08/2022
 * Time: 22:54
 */

namespace Dancode\RouterLoader;


use Illuminate\Support\Arr;

class RouteHelper
{
    protected static $uri = null;

    protected static function loadUri()
    {
        if (!self::$uri)
        {
            self::$uri = config('route_loader');
        }
    }

    public static function uri($key)
    {
        self::loadUri();
        return Arr::get(self::$uri, $key, '/');
    }
}
