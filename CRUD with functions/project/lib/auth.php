<?php

$connect = mysqli_connect("localhost", "root", "", "lmsroute", "3305");

function checkEmailAndPassword($email,$password){
    $query = mysqli_query($GLOBALS['connect'], "SELECT * FROM `instructors` where  `email`='$email' AND `password`='$password'");
    $row = mysqli_fetch_assoc($query);
    return $row;
}