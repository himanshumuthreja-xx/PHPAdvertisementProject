<?php
include "./includes/db.php";
include "./includes/header.php";

if(isset($_SESSION["loggedInUser"])){
    $isLoggedOut = logOut();
    if($isLoggedOut){
        header("Location: http://localhost:8181/php/Project/Advertisement/Login.php");
        exit();
    }
}
