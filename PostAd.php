<?php 

include "includes/upload.php";
include "includes/db.php";

    if(isset($_POST["submit"]))
    {
        $title = $_POST['adTitle'];
        $categoryId = $_POST['adCategories'];
        $adDuration = $_POST['adDuration'];
        $filePath = uploadFile();
        if($filePath){
            postAd($title,$categoryId,$adDuration,$filePath);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css" content-type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>

<body>
    <?php include "includes/header.php" ?>
    <div class="container">
        <div class="col-sm-12">
            <h1 class="text-center ">Post Ad</h1>
        </div>
        <form action="PostAd.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="adTitle">Title</label><span class="required">*</span>
                <input type="text" class="form-control" id="adTitle" name="adTitle" aria-describedby="adTitleHelp" placeholder="Enter title">
            </div>
            <div>
                <input type="file" name="fileToUpload" id="fileToUpload" />
            </div>
            <br>
            <label for="adDur">How long this ad would run: </label>
            <select name="adDuration" id="adDur">
                <?php 
                    for($day = 10;$day<=100;$day++){
                        echo "<option value='$day'>$day days</option>'";
                    }
                ?>
            </select>
            <br>
            <label for="adCateg">Select Category: </label>
            <select name="adCategories" id="adCateg">
                <?php 
                    $categories = getAllCategories();
                    if($categories){
                        while($category = $categories->fetch_assoc()){
                            $adcategoryid = $category['adcategoryid'];
                            $categoryName = $category['categoryname'];
                            echo "<option value='$adcategoryid' >$categoryName</option>";
                        }
                    }else{
                        echo 'No category';
                    }
                ?>
            </select>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
