<?php 
    include "includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>

<body>
    <?php include "includes/header.php" ?>

    <br>
    <div class="container">
        <center>
            <h3>Ads</h3>
        </center>
        <label for="adCateg">Select Category: </label>
        <select name="adCategories" id="adCateg" onchange="changeCategory();">
                <?php 
                    $categories = getAllCategories();
                    if($categories){
                        echo "<option value=''>All</option>";
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
        <div class="carousel slide" id="adImagesCarousel" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $ads;
                    if(isset($_GET['category'])){
                        $ads = getAllAds($_GET['category']);
                    }else{
                        $ads = getAllAds();
                    }
                    if($ads != null && $ads -> num_rows >0){
                        for($adCounter = 0;$adCounter<$ads->num_rows;$adCounter++){
                            $ad = $ads-> fetch_assoc();
                            $adPath = $ad['ImagePath'];
                            $adTitla = $ad['adtitle']; 
                            if($adCounter == 0){ echo "
                                <div class='carousel-item active'>
                                    <img src='$adPath' alt='Error showing Image' width='1110' height='400'>
                                    <div class='carousel-caption d-none d-md-block'>
                                        <p>$adTitla</p>
                                    </div>
                                </div>";
                            }else{ 
                                echo "
                                <div class='carousel-item '>
                                    <img src='$adPath' alt='Error showing Image' width='1110' height='400'>
                                    <div class='carousel-caption d-none d-md-block'>
                                        <p>$adTitla</p>
                                    </div>
                                </div>";
                            }
                        }
                    } else {
                        echo "<br><center> Sorry! No Result Found! </center>";
                    }
                ?>
                    <!--
<div class="carousel-item active">
    <img src="AdsImages/59f76153a2ebe.jpg" alt="Error showing Image" width="1110" height="400">
    <div class="carousel-caption d-none d-md-block">
        <h3>First Image</h3>
        <p>Description</p>
    </div>
</div>
<div class="carousel-item">
    <img src="AdsImages/59f76153a2ebe.jpg" alt="Error showing Image" width="1110" height="400">
</div>
<div class="carousel-item">
    <img src="AdsImages/59f76153a2ebe.jpg" alt="Error showing Image" width="1110" height="400">
</div>
-->
            </div>
            <a href="#adImagesCarousel" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#adImagesCarousel" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

    <?php 
        if(isset($_GET['category'])){ $category = $_GET['category']; 
        echo "<script> setAdCategory('$category') </script> "; 
    echo $category;
    }
    else {}
    ?>
</body>

</html>
