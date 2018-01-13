<?php 

include "./includes/db.php";
include "./includes/validation.php";
//    setcookie("Himanshu",100,time()+(60*60*24*7));
//    session_start();
    $isValidForm = validateRegister();
    if($isValidForm){
        $isConnected = connectDatabase();
        if($isConnected){
            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $mobileNumber = $_POST["mobilenumber"];
            $emailAddress = $_POST["emailaddress"];
            $password = $_POST["password"];
            addUser($firstName,$lastName,$mobileNumber,$emailAddress,$password);
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <?php include "includes/header.php" ?>
        <div class="col-sm-12">
            <h1 class="text-center ">Register</h1>
        </div>
        <form action="Register.php" method="post">
            <div class="form-group">
                <label for="firstName">First Name</label><span class="required">*</span>
                <input type="text" class="form-control" id="firstName" name="firstname" aria-describedby="firstNameHelp" placeholder="Enter first name">
                <b class="errorMessage" id="firstNameError">Please enter First Name</b><br/>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label><span class="required">*</span>
                <input type="text" class="form-control" id="lastName" name="lastname" aria-describedby="lastNameHelp" placeholder="Enter last name">
                <b class="errorMessage" id="lastNameError">Please enter Last Name</b><br/>
            </div>
            <div class="form-group">
                <label for="mobileNumber">Mobile Number</label><span class="required">*</span>
                <input type="tel" class="form-control" id="mobileNumber" name="mobilenumber" aria-describedby="mobileNumberHelp" placeholder="Enter mobile number">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <b class="errorMessage" id="mobileError">Please enter Mobile number.</b><br/>
            </div>
            <div class="form-group">
                <label for="userEmail">Email address</label><span class="required">*</span>
                <input type="email" class="form-control" id="userEmail" name="emailaddress" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <b class="errorMessage" id="emailError">Please enter E-Mail.</b><br/>
            </div>
            <div class="form-group">
                <label for="userPassword">Password</label><span class="required">*</span>
                <input type="password" class="form-control" name="password" id="userPassword" placeholder="Password">
                <b class="errorMessage" id="passwordError">Please enter Password.</b><br/>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label><span class="required">*</span>
                <input type="password" class="form-control" id="confirmPassword" name="confirmpassword" placeholder="Confirm Password">
                <b class="errorMessage" id="confirmPasswordError">Confirm Password does not match.</b><br/>
                <b class="errorMessage" id="confirmPasswordBlankError">Please enter Confirm Password.</b><br/>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                      <input type="checkbox" class="form-check-input">
                  Check me out
                </label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
