<?php
session_start();
if (empty($_SESSION['user']) || $_SESSION['user']['role']==1 ) {
    header("location: login.php");
}


require "lib/CRUD.php";

$id=$_GET['id'];

delete($id);
setcookie("msg","category deleted",time()+2,'/');

header("location:show.php");

?>


