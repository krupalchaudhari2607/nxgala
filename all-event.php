
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Style/Header.css">
    <link rel="stylesheet" href="Style/Cards.css">
    <link rel="stylesheet" href="Style/Footer.css">
</head>
<body>
    
    <?php require_once 'Includes/Header.php' ?>


    <?php 
    $type = $_GET['Category'];
    require_once 'Includes/config.php';

    $sql= "SELECT events.ID,events.Image,events.Price,events.Type,agency.Agency_Name FROM events INNER JOIN agency ON events.Username=agency.Username WHERE events.Type='$type'";
    $result = mysqli_query($db,$sql);
 ?>
<h1 style="text-align:center;font-family:Verdana, Geneva, Tahoma, sans-serif;margin-top:5%;margin-bottom:2%;">All <?php echo $type; ?></h1>
<div class="card-holder">
    
    <?php 
    while($res = mysqli_fetch_array($result)){ ?>
        <a href="productdetails?n=<?php echo $res['ID']?>" style="text-decoration:none;color:#000;">
        <div class="cards">
            <img src="<?php echo "Agency/Images/". $res['Image'] ?>"  alt="">
            <div class="cardtext">
            <h3 class="Name"><?php echo ($res['Agency_Name']); ?></h3>
            <h5><?php echo $res['Type'] ?></h5>
            <h4>Price : <?php echo $res['Price'] ?></h4>
            <a href="productdetails?n=<?php echo $res['ID']?>" class="book-btn">Book Now</a>
            </div>
        </div>
         </a>
         <?php } ?>
    </div>


    <?php require_once 'includes/Footer.php' ?>
    <script src="Javascript/Header.js"></script>
</body>
</html>