<?php
// session_start();
$uname = $_SESSION['Username_Agency'];
require_once 'config.php';
$usql = mysqli_query($db,"SELECT * FROM agency WHERE Username = '$uname'");
$userdata = mysqli_fetch_array($usql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Style/Header.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<?php require_once 'logout.php'; ?>
    <header class="header">
    <a href="home" class="logo"><span><img src="../Images/favicon.png" style="height: 25px;width: 25px;display: inline;line-height: 25px;"></span>NxGala</a>
        <nav class="navbar">
            <a href="home">Posts</a>
            <a href="order">Order</a>
            <a href="event">Events</a>
            <a href="create">Create Event</a>
            <a href="change-password">Reset Password</a>

        </nav>
        <div class="icons">
            <!-- <i class="fa fa-search" id="search-icon"></i> -->
            <?php
            if (isset($_SESSION['Username_Agency'])) { ?>
                <!-- # code...
            } -->
            <i class="fa fa-user" id="user-btn"></i>
            <?php } ?>
            <i class="fa fa-bars" id="menu-bars"></i>
            
        </div>
        <!-- <form action="search.php" class="search-form" method="GET" >
            <input type="search" name="Search_input" id="" class="search-box"placeholder="Search Here...">
             <button style="height:100%;font-size:15px;padding:2px;cursor:pointer"><i class="fa fa-search">Search</i></button>

        </form> -->
        <?php

        if (isset($_SESSION['Username_Agency'])) {?>
                
        <div class="user-details">
            <div class="upper">
                <div class="profile" style="cursor: pointer;">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="down">
                <hr style="border: .5px solid rgb(114, 112, 112);">
                <div class="details">
                    <h5>User : <?php echo base64_decode($userdata['Name']).' '.base64_decode($userdata['Surname']) ?></h5>
                </div>
                <div class="details">
                    <h5>Username : <?php echo base64_decode($userdata['Username']) ?></h5>
                </div>
                <div class="details">
                    <h5>Email :</h5><p>&nbsp;<?php echo base64_decode($userdata['Email']) ?></p>
                </div>
                <div class="details">
                    <h5>Phone : <?php echo ($userdata['Phone']) ?> </h5>
                </div>
                <div class="details">
                    <h5>Agency Name : <?php echo $userdata['Agency_Name'] ?></h5>
                </div>
                <div class="details">
                    <h5>Adderess : <?php echo ($userdata['Adderess']) ?></h5>
                </div>
                <div class="button" style="display: flex;justify-content:space-between">
                <a href="Edit" style="width:40%;">Edit</a>
               <a href="../index?lg='logout'" style="width:40%;">Logout</a>
               </div>
            </div>
        </div>
        <?php } ?>
    </header>
    <div class="space" style="margin-top:5%;"></div>

    <script>
        let menu = document.querySelector('#menu-bars');
        let navbar = document.querySelector('.navbar');

        let userbtn = document.querySelector('#user-btn');
        let userdetails = document.querySelector('.user-details');

        menu.onclick = () =>{
            navbar.classList.toggle('active');
            userdetails.classList.remove('active');
            // menu.classList.remove('active');
        }
        userbtn.onclick = () =>{
            userdetails.classList.toggle('active');
            navbar.classList.remove('active');
            // menu.classList.remove('active');
        }

        window.onscroll = () =>{
        menu.classList.remove('active');
        navbar.classList.remove('.navbar');
        }
    </script>
</body>
</html>