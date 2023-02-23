<?php

namespace core;

class Route
{
    protected static $routes;

    public Request $request;
    /**
     * @param $uri
     */
    public function __construct($uri)
    {

    }

    public static function get($path, $action): void
    {
        self::$routes['get'][$path] = $action;
    }

    public static function post($path, $action): void
    {
        self::$routes['post'][$path] = $action;
    }

    public static function put($path, $action): void
    {
        self::$routes['put'][$path] = $action;
    }

    public static function patch($path, $action): void
    {
        self::$routes['patch'][$path] = $action;
    }

    public static function delete($path, $action): void
    {
        self::$routes['delete'][$path] = $action;
    }
}