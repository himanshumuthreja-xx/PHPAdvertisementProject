<?php 
include "email.php";

$salt = '$5$happyismyname';
session_start();
//connectDatabase();
function connectDatabase(){
    global $connection;
    $connection= mysqli_connect('localhost:3306','root','himanshu@1','advertisement');

    if($connection){
//        sendRegistrationEmail($connection,'Himanshu Muthreja','hmuthreja4@gmail.com','Registration');
        return $connection;
    }
    else{
        return false;
    }
}

function addUser($firstName, $lastName, $mobileNumber, $emailAddress, $password){
    global $salt;
    $connection = connectDatabase();
    if($connection){
        $firstName = mysqli_real_escape_string($connection,$firstName);
        $lastName = mysqli_real_escape_string($connection,$lastName);
        $mobileNumber = mysqli_real_escape_string($connection,$mobileNumber);
        $emailAddress = mysqli_real_escape_string($connection,$emailAddress);
        $password = crypt(mysqli_real_escape_string($connection,$password),$salt);
        
        $query = "select * from advertisement.users Where emailid = '$emailAddress' limit 1;";
        $user = $connection->query($query);
        if($user->num_rows > 0){
            echo "User already exists";
        }
        else{
            $dt = date("Y-m-d H:i:s");
            $query = "INSERT INTO advertisement.users(FirstName,LastName,MobileNumber,EmailId,password,CreatedOn,Enabled,Deleted,IsAdmin)";
            $query .= " VALUES('$firstName','$lastName','$mobileNumber','$emailAddress','$password','$dt',1,0,1);";
//            echo $query;
            $newUser = $connection->query($query);
            if($newUser){
                echo "User created";
                sendRegistrationEmail($connection,$firstName.' '.$lastName,$emailAddress,'Registration');
            }else{
                echo "Unable to create a new user";
            }
        }
    }else{
        die("Unable to connect to database");
    }
}

function login($username,$password){
    global $salt;
    $connection = connectDatabase();
    if($connection){
        $username = mysqli_real_escape_string($connection,$username);
        $password = crypt(mysqli_real_escape_string($connection,$password),$salt);
        $query = "Select * from advertisement.users where emailid = '$username' and password = '$password'";
        $result = $connection -> query($query);
        if($result->num_rows > 0){
            $row = $result -> fetch_assoc();
            $user =  $row['EmailId'];
            $_SESSION["loggedInUser"] = $user;
//            echo $user;
            setcookie($user,$user,time()+(60*60*24*7));
//            sendEmail("Login Successful","hmuthreja4@gmail.com");
//            echo "Logged in user is: ".$_SESSION["loggedInUser"];
            
            return true;
        }else{
            echo "User not found";
            return false;
        }
    }else{
        die("Unable to connect to database");
    }
}

function logOut(){
    session_unset();
    session_destroy();
    return true;
}

function getAllCategories(){
    $query = "select adcategoryid,categoryname from advertisement.ad_categories_master where enabled = 1 and deleted = 0;";
    $connection = connectDatabase();
    if($connection){
        $categories = $connection->query($query);
        if($categories->num_rows > 0){
            echo "Function called";
            return $categories;
        }else{
            echo 'No category found';
            return false;
        }
    }
}

function postAd($title,$categoryId,$adDuration,$filePath){
    $fileDetail = explode('/',$filePath);
    $fileName = end($fileDetail);
    $query = "insert into advertisement.ads(adTitle,ImagePath,ImageName,CreatedOn,CreatedBy,StartDate,EndDate,Enabled,Deleted,CategoryId) ";
    $query .= " Values('$title','$filePath','$fileName', current_timestamp(),1,curdate(),date_add(curdate(), INTERVAL $adDuration DAY),1,0,$categoryId);";
    $connection = connectDatabase();
    if($connection){
        $result = $connection -> query($query);
        if($result){
            header("Location: http://localhost/php/Project/Advertisement/Home.php");
        }else{
            echo "Sorry your ad could not be posted";
        }
    }
}

function getAllAds($category = ""){
    $connection = connectDatabase();
    if($connection){
        $query = "select adtitle,ImagePath,ac.CategoryName from advertisement.ads a inner join advertisement.ad_categories_master ac on 
a.categoryid = ac.AdCategoryId";
        if($category !== ""){
            $query .= " where ac.adcategoryId = '$category'";
        }
        $result = $connection -> query($query);
            return $result;
    }
}

?>
