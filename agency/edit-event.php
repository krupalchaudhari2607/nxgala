<?php
require_once '../includes/Agency_Auth.php';
    $errors=array();
    error_reporting(0); 
    require_once '../Includes/config.php';
    $uname = base64_decode($_SESSION['Username_Agency']);
    $id = $_GET['n'];
    $User_Name = $_SESSION['Username_Agency'];
    
    // $Cheak = "SELECT `Type` FROM `events` WHERE Username = '$uname'";
    // $validate=mysqli_query($db,$Cheak);
    // $cheaking=mysqli_num_rows($validate);
    
    // if ( $cheaking > 0	) {
    //   array_push($errors,"You Can't Add Same Types Of Event More Than One");
    // }else{
    //   echo "You Are ready To Add";
    // }
    $p_sql = mysqli_query($db,"SELECT * FROM events WHERE ID='$id'");
    $res = mysqli_fetch_array($p_sql);

	if (isset($_POST['update'])) {
        
    
        $type =  mysqli_real_escape_string($db,$_POST['type']);
        $price=  mysqli_real_escape_string($db,$_POST['price']);
        $description =  mysqli_real_escape_string($db,$_POST['description']);
          
        $usql = mysqli_query($db,"UPDATE `events` SET `Price`='$price',`Description`='$description' WHERE `Username`='$User_Name' AND `Type`='$type';");
        if ($usql) {
          # code...
          echo "Data Updated";
           header('Location:Event.php');
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
    @media (max-width:450px){
        .body{
          margin-top: 15%;
        }
    }
    @media(max-width:778px){
        .body{
            margin-top: 18%;
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
      <span> Update Event </span>
      <form action="edit-event" method="POST" enctype="multipart/form-data" >
        <div class="error-text"><?php include '../includes/errors.php'; ?></div>
        <div class="name-details">
            <div class="field input">
                <label>Username</label>
                <input type="text" name="name" value="<?php echo base64_decode($_SESSION['Username_Agency']) ?>" readonly>
              </div>

          <div class="field input">
            <label>Type</label>
            <input type="text" value="<?php echo $res['Type'] ?>" name="type" readonly >
          </div>
        </div>
        <div class="field input">
          <label>Price</label>
          <input type="text" name="price" placeholder="<?php echo $res['Price'] ?>"  required>
        </div>
        <div class="field input">
          <label>Description</label>
          <textarea name="description" id="" cols="30" rows="10" placeholder="<?php echo $res['Description'] ?>"></textarea>
        </div>
       
        <div class="field button">
          <input type="submit" class="btn" name="update" value="Update">
        </div>
      </form>
      </section>
  </div>
</div>
</div>
</body>
</html>