<?php
if (!function_exists('view')){
    function view($view, $data = null){

        $view = str_replace('.', '/', $view);

        return require 'views/'. $view;
    }
}