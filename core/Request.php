<?php

namespace core;

class Request
{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = str_contains($path, '?');
        if(!$position) {
            return $path;
        }
        return substr($path, 0, true);
    }
}