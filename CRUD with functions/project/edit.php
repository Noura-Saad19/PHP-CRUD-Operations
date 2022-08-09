<?php

session_start();
if (empty($_SESSION['user']) || $_SESSION['user']['role']==1 ) {
    header("location: login.php");
}

require "lib/CRUD.php";

update($_POST['category'],$_POST['id']);
header("location:show.php");

?>

