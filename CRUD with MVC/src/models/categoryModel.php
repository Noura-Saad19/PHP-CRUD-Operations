<?php

namespace Route\Db\models;

use Route\Db\db;

class categoryModel extends db
{
    public function getAllCategory()
    {
        return $this->select("category")->rows();

    }

    public function addNewCategory($data)
    {
        return $this->insert("category", $data)->excute();
    }

    public function deleteCategory($id)
    {
        return $this->delete("category")->where("id", "=", $id)->rows();

    }


    public function showCategoryById($id)
    {
        return $this->select("category")->where("id", "=", $id)->first();

    }

    public function updateCategory($data, $id)
    {
        return $this->update("category", $data)->
        where("id", "=", $id)->excute();
    }


}