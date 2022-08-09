<?php

session_start();
require 'lib\auth.php';

//if($_SERVER['REQUEST_METHOD'] == 'POST'){
//if (isset($_POST['password'])) {
if (isset($_POST['email'])) {
    $data = checkEmailAndPassword($_POST['email'], $_POST['password']);
    if (!empty($data)) {
        $_SESSION['user'] = $data;

        if($_POST['role']){

        }
        header("location:show.php");
    }
    else{
        header("location:login.php");
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


<form action="login.php" method="post">
    <input type="text" name="email">
    <input type="text" name="password">
<!--    <select name="role">-->
<!--        <option value="1">1</option>-->
<!--        <option value="2">2</option>-->
<!--    </select>-->
    <input type="submit" value="login">
</form>


</body>
</html>

