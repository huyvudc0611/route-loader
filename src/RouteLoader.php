<?php
/**
 * User: HuyVu
 * Date: 02/08/2022
 * Time: 22:43
 */

namespace Dancode\RouterLoader;


use Illuminate\Support\Facades\Route;

class RouteLoader
{
    protected static $instance = null;

    protected $request;
    protected $middleware = null;
    protected $namespace = null;
    protected $routePath;

    public function __construct()
    {
        $this->request = app()->request;
    }

    public static function instance()
    {
        if(self::$instance == null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function setMiddleware($name = [])
    {
        $this->middleware = $name;
        return $this;
    }

    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }

    public function group($path)
    {
        $this->routePath = $path;
        return $this;
    }

    public function load($name = '', $positionSegment = 1 )
    {
        if (!app()->runningInConsole() && $name)
        {
            $name = (array)$name;
            $segment = $this->request->segment($positionSegment);
            if (is_array($name) && !in_array($segment, $name))
            {
                return false;
            }
        }

        Route::middleware($this->middleware)
            ->namespace($this->namespace)
            ->group($this->routePath);
    }
}
