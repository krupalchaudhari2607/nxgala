<?php
    require_once '../includes/Admin_Auth.php'; 
    require_once '../Includes/config.php';
    $errors=array();
    
	if (isset($_POST['Create'])) {
        


		$name= $_POST['name'];
        $date= date("Y-m-d h:i:s");
        
        $errors =array();


        // VAlidation
        $target = "Upload/".basename($_FILES['image']['name']);

            $image= $_FILES['image']['name'];
            
            $sql = "INSERT INTO `category`(`Name`, `Image`,  `Date`) VALUES ('$name','$image','$date')";
             mysqli_query($db,$sql);
    
    
    
        if ( move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
        header('Location:events.php');  
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
    <title>Events | Dashboard</title>
</head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2>Category</h2>
    </section>
    
    <div class="contactForm">
        <h2>Create Event</h2>
        <form action="Create_events.php" method="POST" enctype="multipart/form-data" >
            <div class="inputBox">
                <h3>Title</h3>
                <input type="text" name="name" >
                
            </div>
            
            <div class="inputBox">
                <span>Image</span> <br>
                <input type="file" name="image" >
                </div>
            <div class="inputBox">
            <button type="submit" name="Create"> Create </button>
            </div>
        </form>
    </div>


</body>
</html>