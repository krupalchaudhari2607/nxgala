<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Style/slider.css">
    <link rel="stylesheet" href="Style/Cards.css">
    <link rel="stylesheet" href="Style/Header.css">
    <link rel="stylesheet" href="Style/Footer.css">
</head>
<body >
    <?php


    require_once 'Includes/Header.php';
    require_once 'slider.php';
    require_once 'Includes/User_Auth.php';
    //  require_once 'Includes/logout.php';
    ?>

    <!-- Category Start -->
    <?php 
    $category_sql= "SELECT * FROM category";
    $result = mysqli_query($db,$category_sql);
    ?>
    <h1 style="text-align:center;font-family:Verdana, Geneva, Tahoma, sans-serif;margin-top:40px;">Category</h1>
    <div class="card-holder">

    <?php 
    while($category_res = mysqli_fetch_array($result)){ ?>
        <a href="all-event?Category=<?php echo $category_res['Name']; ?>" style="text-decoration:none;color:#000;">
        <div class="cards">
            <img src="<?php echo "Admin/Upload/". $category_res['Image'] ?>"  alt="">
            <div class="cardtext">
            <h5 style="margin-bottom: 1%;"><?php echo $category_res['Name'] ?></h5>
            <a href="All_Event?Category=<?php echo $category_res['Name']; ?>" class="book-btn" style='margin-top:10px;'>View All</a>
            </div>
        </div>
         </a>
         <?php } ?>
</div>
    <!-- Category End -->
    <!-- Product Area  Start-->
    <?php 

 $sql= "SELECT events.ID,events.Image,events.Price,events.Type,agency.Agency_Name FROM events INNER JOIN agency ON events.Username=agency.Username";
 $result = mysqli_query($db,$sql);
 ?>
<h1 style="text-align:center;font-family:Verdana, Geneva, Tahoma, sans-serif;margin-top:40px;">All Events</h1>
<div class="card-holder">

    <?php 
    while($res = mysqli_fetch_array($result)){ ?>
        <a href="productdetails?n=<?php echo $res['ID']?>" style="text-decoration:none;color:#000;">
        <div class="cards">
            <img src="<?php echo "Agency/Images/".$res['Image'] ?>"  alt="">
            <div class="cardtext">
            <h3 class="Name"><?php echo ($res['Agency_Name']); ?></h3>
            <h5><?php echo $res['Type'] ?></h5>
            <h4>Price : <?php echo $res['Price'] ?></h4>
            <a href="productdetails?n=<?php echo $res['ID']?>" class="book-btn">View</a>
            </div>
        </div>
         </a>
         <?php } ?>
    </div>
        

    <?php require_once 'Includes/Footer.php' ?>
    <!-- Product Area End -->
    <script src="Javascript/Header.js"></script>
</body>
</html>