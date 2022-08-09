<?php


namespace Route\Db\controllers;

use Route\Db\core\baseController;
use Route\Db\models\categoryModel;
use Route\Db\views\index;

class category extends baseController
{

//show all category
    public function index()
    {
        $category = new categoryModel;
        $data = $category->getAllCategory();
        $this->view("category/index", ['data' => $data]);
    }

    public function add()
    {
        return $this->view("category/add");
    }

//    sava data to category
    public function store()
    {
        $category = new categoryModel;
        $category->addNewCategory($_POST);
        header("location: index");

    }

//show category by id
    public function edit($id)
    {
        $category = new categoryModel;
        $data = $category->showCategoryById($id);
        $this->view("category/update",
            ['data' => $data]);
    }

//    save update
    public function update()
    {
        $category = new categoryModel;
        $category->updateCategory(
            ['title' => $_POST['title']],
            $_POST['id']
        );
//        print_r($category);die;
        header("location:index");
    }

//  delete from category
    public function delete($id)
    {
        $category = new categoryModel;
        if ($category->showCategoryById($id)) {
            $category->deleteCategory($id);
            header("location: ../index");

        }

    }


}