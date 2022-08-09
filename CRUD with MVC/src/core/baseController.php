<?php

namespace Route\Db\core;
class baseController
{
    public function __call($name, $argument)
    {
        echo "this method : (" . $name . ") not exist ";
    }

    protected function view($path, $data = [])
    {
        extract($data);
        require "../src/views/" . $path . ".php";
    }
}