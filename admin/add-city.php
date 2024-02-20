<?php
     require_once '../includes/Admin_Auth.php'; 
     require_once '../Includes/config.php';
    if (isset($_POST['Create'])) {
       $city = $_POST['city'];
       $lat = $_POST['lat'];
       $long = $_POST['longitude'];
    //    echo $city;
    //    echo $lat;
    //    echo $long;
        $insert = mysqli_query($db,"INSERT INTO `city`(`Name`, `Latitude`, `Longitude`) VALUES ('$city','$lat','$long')");
        if ($insert) {
        header('Location:city');  
        }    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Create_Slideshow.css">
    <title>Slideshow | Dashboard</title>
</head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2>Add City</h2>
    </section>
    
    <div class="contactForm">
        <h2>Add Slide</h2>
        <form action="add-city" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
                <input type="text" name="city" required >
                <span>City Name</span>
            </div>
            
            <div class="inputBox">
                <span>Latitude</span> <br>
                <input type="text" name="lat" required >
            </div>
            <div class="inputBox">
                <span>Longitude</span> <br>
                <input type="text" name="longitude" required >
            </div>
            <div class="inputBox">
            <button type="submit" name="Create" class="add"> Add </button>
            </div>
        </form>
    </div>


</body>
</html>