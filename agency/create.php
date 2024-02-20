<?php
require_once '../includes/Agency_Auth.php';
    $errors=array();
    require_once '../Includes/config.php';
    $uname = base64_decode($_SESSION['Username_Agency']);
    // $watermarkImagePath = 'stamp.png'; 
    
    // $Cheak = "SELECT `Type` FROM `events` WHERE Username = '$uname'";
    // $validate=mysqli_query($db,$Cheak);
    // $cheaking=mysqli_num_rows($validate);

    // if ( $cheaking > 0	) {
    //   array_push($errors,"You Can't Add Same Types Of Event More Than One");
    // }else{
    //   echo "You Are ready To Add";
    // }
         
	if (isset($_POST['Create'])) {
        
    
        $combination="";
        $name=  base64_encode(mysqli_real_escape_string($db,$_POST['name']));
        $price=  mysqli_real_escape_string($db,$_POST['price']);
        $description =  mysqli_real_escape_string($db,$_POST['description']);
        $type=  mysqli_real_escape_string($db,$_POST['type']);
        $date= date("Y-m-d h:i:s");
        
        
         $errors =array();

         $Cheak = "SELECT * FROM `events` WHERE Username = '$name' AND Type = '$type';";
          $validate=mysqli_query($db,$Cheak);
          $cheaking=mysqli_num_rows($validate);
          
          if ( $cheaking > 0	) {
            array_push($errors,"You Can't Add Same Types Of Event More Than One");
          }else{
            $target = "Images/".basename($_FILES['image']['name']);
        
            $image= $_FILES['image']['name'];
            $allowed_ext = array('png','jpg','jpeg');
            $file_ext = pathinfo($image,PATHINFO_EXTENSION);
            
            if (!in_array($file_ext,$allowed_ext)) {
              array_push($errors,"You Can Upload Only jpeg,jpg,png");
            

            }else{
            if (file_exists("Images/" . $_FILES['image']['name'])) {
              array_push($errors,"This Image Already Exist");
            }else{
              if(move_uploaded_file($_FILES["image"]["tmp_name"], $target)){ 
                // Load the stamp and the photo to apply the watermark to 
                // $watermarkImg = imagecreatefrompng($watermarkImagePath); 
                // switch($file_ext){ 
                //     case 'jpg': 
                //         $im = imagecreatefromjpeg($target); 
                //         break; 
                //     case 'jpeg': 
                //         $im = imagecreatefromjpeg($target); 
                //         break; 
                //     case 'png': 
                //         $im = imagecreatefrompng($target); 
                //         break; 
                //     default: 
                //         $im = imagecreatefromjpeg($target); 
                } 
                 
                // Set the margins for the watermark 
                // $marge_right = 10; 
                // $marge_bottom = 10; 
                 
                // // Get the height/width of the watermark image 
                // $sx = imagesx($watermarkImg); 
                // $sy = imagesy($watermarkImg); 
                 
                // // Copy the watermark image onto our photo using the margin offsets and  
                // // the photo width to calculate the positioning of the watermark. 
                // imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
                 
                // // Save image and free memory 
                //   imagepng($im, $target); 
                //  imagedestroy($im); 
     
                $insert = mysqli_query($db,"INSERT INTO `events`(`Username` ,`Price`, `Description`, `Image`, `Type`, `Date`) VALUES ('$name','$price','$description','$image','$type','$date')");
                if ($insert) {
                  header('location:Event');
                }
        }
      }
      }
          
    }
  

?>
<!DOCTYPE html>

<html>
<head>
    <title>NxGala | Agency</title>
    <link rel="shortcut icon" href="../Images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="../Style/form.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .body{
      margin-top: 5%;
    }
    @media(max-width:778px){
      .body{
        margin-top: 15%;
      }
    }
  </style>
</head>
<body>  
    <?php require_once '../includes/Agency_Header.php' ?>
  <div class="body">
  <div class="contact" Style="margin-top:20px; margin-bottom:20px;">
  <div class="wrapper">
    <section class="form">
      <span> Create Event </span>
      <form action="create" method="POST" enctype="multipart/form-data" >
        <div class="error-text"><?php include '../includes/errors.php'; ?></div>
        <div class="name-details">
            <div class="field input">
                <label>Username</label>
                <input type="text" name="name" value="<?php echo base64_decode($_SESSION['Username_Agency']) ?>" readonly>
              </div>

          <div class="field input">
            <label>Type</label>
            <select name="type" id="" class="Select" >
             <option value="" required>Select Type</option>
            <?php 
         

             $sql= "SELECT * FROM category";
             $result = mysqli_query($db,$sql);
             $i=0;
             while($res = mysqli_fetch_array($result)){
             ?>
             <option><?php echo $res['Name']; ?> </option>
            
                <?php } ?>
                </select>
          </div>
        </div>
        <div class="field input">
          <label>Price</label>
          <input type="text" name="price" placeholder="Price" required>
        </div>
        <div class="field input">
          <label>Description</label>
          <textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
        </div>
       
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" >
        </div>
        <div class="field button">
          <input type="submit" class="btn" name="Create" value="Create">
        </div>
      </form>
      </section>
  </div>
</div>
</div>
</body>
</html>