<?php

namespace core;


use controllers\Controller;
use Exception;

class Application
{
    public static Application $app;

    public function __construct(
        public Route $route,
        public DB $db,
        public Session $session,
        public Controller $controller

    ){
        self::$app = $this;
    }
    public function run()
    {
        try {
            echo $this->route->resolve();
        } catch (Exception $e) {
            $code = $e->getCode();
            $this->route->response->setStatusCode($code);
            echo $this->controller->render("errors/_$code", [
                'code' => $code,
                'message' => $e->getMessage(),
            ]);
        }
    }
}