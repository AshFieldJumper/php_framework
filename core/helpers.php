<?php

use core\Application;

if (!function_exists('view')){
    function view($view, $params = null){

        $view = str_replace('.', '/', $view);

        return Application::$app->route->renderView($view, $params);

    }
}