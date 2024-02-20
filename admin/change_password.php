<?php
session_start();
require_once '../Includes/config.php';
$errors =array();
$old_pass="";
$new_pass="";
$confirm_pass="";
$Admin_User=$_SESSION['Username_admin'];
if (isset($_POST['Change'])) {
	$old_pass =  mysqli_real_escape_string($db,$_POST['Pass1']);
	$new_pass =  mysqli_real_escape_string($db,$_POST['Pass2']);
	$confirm_pass = mysqli_real_escape_string($db,$_POST['Pass3']);	

	$sql="SELECT * FROM admin Where Username='$Admin_User'";
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
			$usql="UPDATE `admin` SET `Password`='$confirm_pass' WHERE Username='$Admin_User'";
			mysqli_query($db,$usql);
			array_push($errors,"Password Changed Succcessfully");
			header('location:index');
			
		}

	}	
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
    Dj Management
	</title>
	<link rel="stylesheet" href="../Style/login.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section>
        <div class="container">
            <div class="user signinbx">
                <div class="imgbx"><img src="../Images/Login1.gif" alt=""></div>
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
                        <input type="submit" name="Change" value="change">
                        <!-- <p class="signup">Already Have an Account ? <span onclick="toggleForm();">Login</span> </p> -->
                    </form>
                </div>
            </div>

        </div>
</section>
</body>
</html>