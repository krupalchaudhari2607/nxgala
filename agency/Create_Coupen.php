<?php
require_once '../includes/Agency_Auth.php';
    $errors=array();
    error_reporting(0);
    $id = $_GET['Edit'];
    $name="";
    $price="";
	if (isset($_POST['Create'])) {
        
        $db = mysqli_connect('localhost','root','','dream_project');
              
		$Coupen= mysqli_real_escape_string($db,$_POST['Coupen_Code']);
		$Coupen_Value= mysqli_real_escape_string($db,$_POST['Coupen_Value']);
        
        $result = mysqli_query($db,"UPDATE `events` SET `Coupen_Code`='$Coupen',`Coupen_Value`='$Coupen_Value' WHERE ID=".$id."");
        if ($result) {
            header('Location:Event.php');
        }
		    
	}
     
?>
<!DOCTYPE html>

<html>
<head>
	<title>
    Dj Management
	</title>
	<link rel="stylesheet" href="../Style/form.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>  
    <?php require_once '../includes/Agency_Header.php' ?>
  <div class="body">
  <div class="contact" Style="margin-top:20px; margin-bottom:20px;">
  <div class="wrapper">
    <section class="form">
      <span>Coupen Code </span>
      <form action="Create_Coupen.php" method="POST" enctype="multipart/form-data" >
        <div class="error-text"></div>
        <div class="name-details">
            <?php 
                    
                      $db = mysqli_connect('localhost','root','','dream_project');
                    $query =mysqli_query($db,"SELECT * from events WHERE ID=".$id."");
                    $res= mysqli_fetch_array($query);
              ?>
                    <div class="field input">
                <label>Coupen Code</label>
                <input type="text" name="Coupen_Code" value="<?php echo $res[6] ?>" >
              </div>

              <div class="field input">
                <label>Coupen Price</label>
                <input type="text" name="Coupen_Value" value="<?php echo $res[7] ?>" >
              </div>
      
            <div class="field button">
            <input type="submit" class="btn" name="Create" value="Create">
            </div>
      </form>
      </section>
  </div>
</div>
</div>
<?php require_once '../includes/Footer.php' ?>
</body>
</html>