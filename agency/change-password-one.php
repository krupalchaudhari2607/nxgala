<?php
require_once '../Includes/config.php';
$errors =array();
session_start();    
error_reporting(0);
if (!isset($_SESSION['Register_agency']) && $_COOKIE['register_agency'] == "") {
    header('Location:index');
}
else if($_COOKIE['register_agency'] != "" )
{
    $_SESSION['Register_agency']=$_COOKIE['register_agency'];
    $uname = $_SESSION['Register_agency'];
}
$old_pass="";
$new_pass="";
$confirm_pass="";
$uname=$_SESSION['Register_agency'];
if (isset($_POST['change'])) {
	$old_pass =  mysqli_real_escape_string($db,$_POST['Pass1']);
	$new_pass =  mysqli_real_escape_string($db,$_POST['Pass2']);
	$confirm_pass = mysqli_real_escape_string($db,$_POST['Pass3']);	

	$sql="SELECT * FROM agency Where Username='$uname'";
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
			$usql="UPDATE `agency` SET `Password`='$confirm_pass' WHERE Username='$uname'";
			mysqli_query($db,$usql);
			array_push($errors,"Password Changed Succcessfully");
			$csql = mysqli_query($db,"SELECT * FROM agency WHERE Username = '$uname'");
			$cres = mysqli_fetch_array($csql);
			if($cres['Agreement'] === "Pending"){
			header('location:agreement');
			}else{
				header('location:Home');
				$_SESSION['Username_Agency'] = $uname;
			}

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
	<title>NxGala | Agency</title>
    <link rel="shortcut icon" href="../Images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="../Style/Header.css">
	<link rel="stylesheet" href="../Style/Login.css">
</head>
<body>

<section>
        <div class="container">
            <div class="user signinbx">
                <div class="imgbx"><img src="../Images/Login1.gif" alt=""></div>
                <div class="formbx">
                   <form action="change-password-one" method="POST">
                        <h2>Create Password</h2>
						<?php echo $_SESSION['success']; ?>
                        <input type="password" name="Pass1"  placeholder="Verification Code" >
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
</body>
</html>