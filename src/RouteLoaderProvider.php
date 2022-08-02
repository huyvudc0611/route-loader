<?php
/**
 * User: HuyVu
 * Date: 02/08/2022
 * Time: 22:20
 */
namespace Dancode\RouterLoader;

use Illuminate\Support\ServiceProvider;

class RouteLoaderProvider extends ServiceProvider
{

    public function boot() {

        $this->publishes([
            __DIR__.'/config/route_loader.php' => config_path('route_loader.php'),
        ]);
    }

    public function register()
    {
        include_once __DIR__ . "/helpers/url.php";
    }
}
