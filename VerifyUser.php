<?php 
include "includes/db.php";

if(isset($_GET['user']))
{
    verifyUser($_GET['user']);
}

function verifyUser($user)
{
    $user =  base64_decode($user);
    $userDetail = explode('_',$user);
    print_r($userDetail);
    $connection = connectDatabase();
    if($connection)
    {
        $getUser = "Update advertisement.Users set isVerified = 1 where EmailId = '$userDetail[1]'";
        $result = $connection->query($getUser);
        echo $connection->affected_rows;
        if(mysqli_affected_rows($connection) != -1)
        {    
            if(mysqli_affected_rows($connection) > 0){
                echo "User Verified";
            }else{
                echo "This link has is already used or has been expired";
            }
        }
        else{
            echo "An error occured";
        }
    }
        
}


?>
