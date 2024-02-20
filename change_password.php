<?php
require_once 'Includes/config.php';
$errors =array();
session_start();    
if (!isset($_SESSION['Username'])) {
    header('Location:index');
}
$old_pass="";
$new_pass="";
$confirm_pass="";
$uname=$_SESSION['Username'];
if (isset($_POST['change'])) {
	$old_pass =  mysqli_real_escape_string($db,$_POST['Pass1']);
	$new_pass =  mysqli_real_escape_string($db,$_POST['Pass2']);
	$confirm_pass = mysqli_real_escape_string($db,$_POST['Pass3']);	

	$sql="SELECT * FROM user Where Username='$uname'";
	$result=mysqli_query($db,$sql);
	$res=mysqli_fetch_row($result);
	$old_password =md5($old_pass);
	
	if ($old_password != $res[6]) {
		array_push($errors,"PLease Entered Correct Password First");
	}else{
		if (empty($new_pass)) {
			array_push($errors,"New Password Is Required");
		}

		if (empty($confirm_pass)) {
			array_push($errors,"Confirm Password Is Required");
		}

		if ($new_pass != $confirm_pass) {
			array_push($errors,"Two Password Are Not Match");
		}else{
			$confirm_pass = md5($confirm_pass);
			$usql="UPDATE `user` SET `Password`='$confirm_pass' WHERE Username='$uname'";
			mysqli_query($db,$usql);
			array_push($errors,"Password Changed Succcessfully");
			header('location:index');
			
		}

	}	
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="Style/Header.css">
	<link rel="stylesheet" href="Style/Login.css">
</head>
<body>
	<?php require_once 'Includes/Header.php' ?>
<section>
        <div class="container">
            <div class="user signinbx">
                <div class="imgbx"><img src="Images/Login1.gif" alt=""></div>
                <div class="formbx">
                   <form action="change_password" method="POST">
                        <h2>Change Password</h2>

                        <input type="password" name="Pass1"  placeholder="Old Password" >
                        <!-- <p class="error">(* You Are Not)</p> -->
                        <input type="password" name="Pass2" placeholder="New Password"   >
                        <p class="error"> <?php #echo $email_error; ?></p>
                        <input type="password" name="Pass3" placeholder="Confirm Password"  >
                        <p class="error"><?php #echo $phone_error; ?></p>

                        <!-- <input type="date" name="dob" id=""> -->
                        <!-- <p class="error">(* You Are Not)</p> -->
                        <input type="submit" name="change" value="change">
                        <!-- <p class="signup">Already Have an Account ? <span onclick="toggleForm();">Login</span> </p> -->
                    </form>
                </div>
            </div>

        </div>
</section>
<script src="Javascript/Header.js"></script>
</body>
</html>