<?php

namespace Route\Db\controllers;

use Route\Db\core\baseController;
use Route\Db\models\categoryModel;
use Route\Db\views\index;

class home extends baseController
{

    public function index()
    {
        $category = new categoryModel;
//        print_r($category->getAllCategory());die;
        $category = $category->getAllCategory();
        $name = "Mohammed";
        $this->view('index',
            ['name' => $name, 'data' => $category]);
//        echo "homeIndex";
    }

    public function add()
    {
        echo "addhome";
    }


}