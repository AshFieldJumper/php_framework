<?php

namespace core;

class Model extends DB
{
    public function __construct(array $data)
    {
        parent::__construct();
        $this->set($data);
    }

    public function set(array $data)
    {
        foreach ($data as $k => $v){
            $this->$k = $v;
        }
    }

}