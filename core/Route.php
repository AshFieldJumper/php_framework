<?php

namespace core;

class Route
{

    public Request $request;
    public Response $response;
    protected static array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @throws \HttpRequestException
     */
    public function resolve(): void
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        if (!isset(self::$routes[$method][$path]))
            throw new \HttpRequestException('Route not found');

        $obj = self::$routes[$method][$path];

        $class = new $obj[0];
        call_user_func($class, $obj[1]);
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

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function layoutContent($viewContent = null)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
}