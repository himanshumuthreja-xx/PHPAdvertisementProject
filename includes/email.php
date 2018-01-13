<?php 
//include "db.php";
//    global $headers;
    $subject="Test Email";
    $to="hmuthreja4@gmail.com";
    $from="hmuthreja4@gmail.com";
    $host="ssl://smtp.gmail.com";
    $username="hmuthreja4@gmail.com";
    $password="happychiya2771995";
    $port = "465";
    $crlf="\n";

    $message="Test Email";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers.="From: hmuthreja4@gmail.com";
    global $connection;
    $connection= mysqli_connect('localhost:3306','root','himanshu@1','advertisement');

    if($connection)
        sendRegistrationEmail($connection,'Himanshu Muthreja','hmuthreja4@gmail.com','Registration');
    else
        echo "DB not connected!";

function sendRegistrationEmail($connection,$fullName,$to,$type)
{  
    global $emailSubject, $emailContent;
    global $registrationLink;
    global $headers;
    $user = $fullName.'_'.$to;
    echo $user;
    $toUser = base64_encode($user);
    echo $to;
    $registrationLink = "http://localhost:8181/php/Project/Advertisement/VerifyUser.php?user=$toUser";
    echo "<br>";
    echo $registrationLink;
    $registrationLink = base64_decode($registrationLink);
    echo "<br>";    
    echo $registrationLink;
    echo "<br>";
    //$connection = connectDatabase(); 
    $query = "SELECT emailSubject,emailContent from advertisement.EmailMaster where emailType = '$type'";  
    if($connection)
    {  
        $result = $connection->query($query);
        if($result->num_rows>0)
        {  
                $email = $result->fetch_assoc();
                $emailSubject = $email['emailSubject'];
                $emailContent = str_replace("[registrationlink]","<a href='$registrationLink' />Click Here </a>",str_replace("[fullname]",$fullName,$email['emailContent']));
                echo $emailContent;
//            $to = base64_decode($to); 
                if(!mail($to,$emailSubject,$emailContent,$headers))  
                    echo "Email not Sent";
                else
                    echo "<br> Email sent!";
                //header("Location: http://localhost:8181/php/Project/Advertisement/Home.php");
                           
        }
        else
            echo "No rows found";
    }  
    
}

?>
