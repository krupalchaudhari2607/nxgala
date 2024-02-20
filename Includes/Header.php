<?php
session_start();


require_once 'config.php';
if (isset($_SESSION['Username'])) {
   
$uname = $_SESSION['Username'];
$usql = mysqli_query($db,"SELECT * FROM user WHERE Username = '$uname'");
$userdata = mysqli_fetch_array($usql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NxGala</title>
    <link rel="stylesheet" href="../Style/Header.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require_once 'Includes/logout.php'; ?>
    <header class="header">
    <a href="index" class="logo"><span><img src="Images/favicon.png" style="height: 25px;width: 25px;display: inline;line-height: 25px;"></span>NxGala</a>
        <nav class="navbar">
        <?php
            if (isset($_SESSION['Username'])) { ?>
                        <a href="index">Hello,<?php echo base64_decode($uname); ?></a>
            <?php }else{ ?>
                <a href="index">Hello,User</a>
                <?php } ?>
            <a href="Order">Order</a>
            <a href="aboutus">About Us</a>
            <a href="contactus">Contact Us</a>
            <?php
            if (!isset($_SESSION['Username'])) { ?>
            
            <a href="login">Login</a>
            <?php } ?>
        </nav>
        <div class="icons">
            <i class="fa fa-search" id="search-icon"></i>
            <i class="fa fa-map-marker" id="location-icon"></i>
            <?php
            if (isset($_SESSION['Username'])) { ?>
                <!-- # code...
            } -->
            <i class="fa fa-user" id="user-btn"></i>
            <?php } ?>
            <i class="fa fa-bars" id="menu-bars"></i>
            
        </div>
        <form action="search" class="search-form" method="GET" >
            <input type="search" name="Search_input" id="" class="search-box"placeholder="Search Here...">
             <button style="height:100%;font-size:15px;padding:2px;cursor:pointer"><i class="fa fa-search">Search</i></button>

        </form>
        <?php

        if (isset($_SESSION['Username'])) {?>
                
        <div class="user-details">
            <div class="upper">
                <div class="profile">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="down">
                <hr style="border: .5px solid rgb(114, 112, 112);">
                <div class="details">
                    <h5>User : <?php echo base64_decode($userdata['Name']).' '.base64_decode($userdata['Surname']) ?></h5>
                </div>
                <div class="details">
                    <h5 style="text-transform: none;" >Username : <?php echo base64_decode($userdata['Username']) ?></h5>
                </div>
                <div class="details">
                    <h5>Email :</h5><p style="text-transform: none;" >&nbsp;<?php echo base64_decode($userdata['Email']) ?></p>
                </div>
                <div class="details">
                    <h5>Phone : <?php echo ($userdata['Phone']) ?> </h5>
                </div>
                <div class="details">
                    <h5>Type : User</h5>
                </div>
               <a href="index?lg='logout'">Logout</a>
            </div>
        </div>
        <?php } ?>
        
    </header>
</body>
</html>