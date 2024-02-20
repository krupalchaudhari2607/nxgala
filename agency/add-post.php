<?php
require_once '../Includes/Agency_Auth.php';
// require_once '../Includes/config.php';
$db =mysqli_connect('localhost','root','','dream_project');
    $errors=array();

    $uname = base64_decode($_SESSION['Username_Agency']);
    $watermarkImagePath = 'stamp.png'; 
    
         
	if (isset($_POST['Create'])) {
         $name=  mysqli_real_escape_string($db,$_POST['name']);
        $Text=  mysqli_real_escape_string($db,$_POST['text']); 
        
         $errors =array();

            $target = "Posts/".basename($_FILES['image']['name']);
            $image= $_FILES['image']['name'];
            $allowed_ext = array('png','jpg','jpeg');
            $file_ext = pathinfo($image,PATHINFO_EXTENSION);
            
            if (!in_array($file_ext,$allowed_ext)) {
              array_push($errors,"You Can Upload Only jpeg,jpg,png");
            

            }else{
            if (file_exists("Posts/" . $_FILES['image']['name'])) {
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
     
                $insert = mysqli_query($db,"INSERT INTO `posts`(`username`, `Image`, `Text`) VALUES ('$name','$image','$Text')");
                if ($insert) {
                  header('location:Home');
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
    <link rel="stylesheet" href="../Style/Footer.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    @media(max-width:778px){
        .body .contact{
          margin-top: 18%;
        }
      }
  </style>
</head>
<body>  
    <?php require_once '../Includes/Agency_Header.php' ?>
  <div class="body">
  <div class="contact" Style="margin-top:50px; margin-bottom:20px;">
  <div class="wrapper">
    <section class="form">
      <span> Add Post </span>
      <form action="add-post" method="POST" enctype="multipart/form-data" >
        <div class="error-text"><?php include '../Includes/errors.php'; ?></div>
        <div class="name-details">
            <div class="field input">
                <label></label>
                <input type="hidden" name="name" value="<?php echo ($_SESSION['Username_Agency']) ?>" readonly>
              </div>


           
        <div class="field input">
          <label>Image</label>
          <input type="file" name="image" placeholder="Image" required>
        </div>

        <div class="field input">
          <label>About Image</label>
          <input type="text" name="text" placeholder="Write Something About Image" required>
        </div>

        <div class="field button">
          <input type="submit" class="btn" name="Create" value="Add Image">
        </div>
      </form>
      </section>
  </div>
</div>
</div>
</body>
</html>