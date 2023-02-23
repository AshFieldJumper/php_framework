<?php

namespace core;

class Request
{
    private $type = null;


    public function __construct()
    {

    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = str_contains($path, '?');
        if(!$position) {
            return $path;
        }
        return substr($path, 0, true);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function input($key)
    {

        return $_GET[$key];
    }
}