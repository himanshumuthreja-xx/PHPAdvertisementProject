<?php 

include "./includes/db.php";
include "./includes/validation.php";
//    setcookie("Himanshu",100,time()+(60*60*24*7));
//    session_start();
    if(isset($_POST["submit"])){
    $isValidForm = validateLogin();
    if($isValidForm){
        $isConnected = connectDatabase();
        if($isConnected){
            $userName = $_POST["loginUserName"];
            $password = $_POST["loginPassword"];
            $isLoggedIn = login($userName,$password);
            if($isLoggedIn){
                header("Location: http://localhost:8181/php/Project/Advertisement/PostAd.php");
            }else{
//                header("Location: http://localhost/php/Project/Advertisement/Login.php");
            }
        }
    }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <?php include "includes/header.php" ?>
        <div class="col-sm-12">
            <h1 class="text-center ">Login</h1>
        </div>
        <form action="Login.php" method="post">
            <div class="form-group">
                <label for="userEmail">Email address</label><span class="required">*</span>
                <input type="email" class="form-control" id="loginUserName" name="loginUserName" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <b class="errorMessage" id="emailError">Please enter E-Mail.</b><br/>
            </div>
            <div class="form-group">
                <label for="userPassword">Password</label><span class="required">*</span>
                <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password">
                <b class="errorMessage" id="passwordError">Please enter Password.</b><br/>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
