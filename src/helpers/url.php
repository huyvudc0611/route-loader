<?php
/**
 * User: HuyVu
 * Date: 02/08/2022
 * Time: 22:51
 */
use Dancode\RouterLoader\RouteHelper;

if (!function_exists('route_loader')) {
    function route_loader($route_loader = '', $route = '', $link_type = '')
    {
        if ($route)
        {
            return route($route);
        }


        return url(RouteHelper::uri($route_loader));

    }
}
