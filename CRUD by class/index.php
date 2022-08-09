<?php

require "db.php";

$database = new db(["localhost", "root", "", "lmsroute", "3305"]);

echo '<pre>';

//print_r($database->select("category","title"));

print_r($database->select("instructors", "*")->where("id", "=", "1")->rows());

echo "<hr>";

print_r($database->select("instructors", "*")->where('id', '=', '5')->first());

echo "<hr>";

print_r($database->delete("instructors")->where('id', '=', '4')->execute());

echo "<hr>";

//$data = [
////   'id' => 4,
//    "firstName"=>"Noor",
//    "lastName"=>"Sa3d",
//    "email"=>"noor@gmail",
//    "password" => "123am123"
//];
//print_r($database->insert("student", $data)->execute());
//
//echo "<hr>";


//$data = [
//    'id' => 6,
//    "firstName"=>"Ahmed",
//    "lastName"=>"Sa3d",
//    "email"=>"Ahmed@gmail",
//    "password" => "1am123"
//];
//print_r($database->update("student", $data)->where('id','=',5)->execute());

//echo "<hr>";


print_r($database->select("instructors", "`email`")->where('id', '=', '6')->andWhere('name', '=', 'Mohamed')->first());

echo "<hr>";

print_r($database->select("instructors", "`email`")->where('id', '=', '5')->orWhere('name', '=', 'Mohamed')->first());

echo "<hr>";

print_r($database->select("category")->join("inner", "product", "category.id", "product.category_id")->rows());
echo "<hr>";

//show error
print_r($database->select("categorys")->join("inner", "product", "category.id", "product.category_id")->rows());
echo "<hr>";

