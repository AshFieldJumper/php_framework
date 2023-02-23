<?php

namespace controllers;

use core\Application;

class Controller
{
    public static function render($view, $params = [])
    {
        return Application::$app->route->renderView($view, $params);
    }
}