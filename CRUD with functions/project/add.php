<?php

session_start();
if (empty($_SESSION['user']) || $_SESSION['user']['role']==1 ) {
    header("location: login.php");
}

require "lib/CRUD.php";
if (isset($_POST['category'])) {
    if($_POST['category'] != ''){
    $result = add($_POST['category']);
    if ($result == 1) {
        setcookie("msg","category inserted",time()+2,'/');
       header("location: show.php");
    } else {
        header("location: add.php");
    }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="add.php" method="post">
    <input type="text" name="category">
    <input type="submit" value="add">
</form>

</body>
</html>