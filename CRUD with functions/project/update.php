<?php

session_start();
if (empty($_SESSION['user']) || $_SESSION['user']['role']==1 ) {
    header("location: login.php");
}

require "lib/CRUD.php";

$id=$_GET['id'];

$row=getCategoryById($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="edit.php" method="post">
    <input type="text" name="category" value="<?=$row['title'];?>">
    <input type="hidden" name="id" value="<?=$row['id'];?>">

<!--    <select name="gender">-->
<!--        <option value="1" --><?php //if($row['gender']==1):?><!-- selected --><?php //endif;?><!-->male</option>-->
<!--        <option value="2" --><?php //if($row['gender']==2):?><!-- selected --><?php //endif;?><!-->female</option>-->
<!--    </select>-->
    <input type="submit" value="update">
</form>
</body>
</html>
