<?php 
function uploadFile()
{
$target_dir = "AdsImages/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

$uploadOK = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir.basename(uniqid().".".$imageFileType);
// Check if image file is actual image or fake image

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    
    if($check !== false){
//        echo "File is an image - ".$check["mime"].".\n";
        $uploadOK = 1;
    } else{
        echo "File is not an image\n";
        $uploadOK = 0;
    }
}

//check if File already exists
if(file_exists($target_file)){
    echo "Sorry, File already exists\n";
    $uploadOK = 0;
}

//Limit file size
if($_FILES["fileToUpload"]["size"] > 500000){
    echo "Sorry, your file is too large\n";
    $uploadOK = 0;
}

//Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
    $uploadOK = 0;
}

if($uploadOK == 0){
//    echo "Sorry, you file could not be uploaded\n";
    return false;
}
else{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
//        echo "The file ".basename($_FILES["fileToUpload"]["name"]). " has been uploaded.\n";
        return $target_file;
    } else{
        echo "Sorry, there was an error uploading your file.\n";
        return false;
    }
}


}
?>
