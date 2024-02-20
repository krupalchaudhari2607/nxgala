<?php
session_start();
require_once 'Includes/config.php';
$errors = array();
$username="";
$email="";
$name = "";
$Type="";
$phone="";
$email_error ="";
$phone_error ="";
$user_error ="";
$date= date("Y-m-d h:i:s");
// $errors = array();
if (isset($_POST['Register'])) {
    $name =  base64_encode(mysqli_real_escape_string($db,$_POST['Name']));	
	$username = base64_encode(mysqli_real_escape_string($db,$_POST['username']));
	$email = base64_encode(mysqli_real_escape_string($db,$_POST['email']));
	$phone = mysqli_real_escape_string($db,$_POST['phone']);
    // $djname =  base64_encode(mysqli_real_escape_string($db,$_POST['djname']));
    $Type = mysqli_real_escape_string($db,$_POST['type']);
    $pass = rand();
    $password = md5($pass);
    if ($Type === 'User' ) {
        $emailquery = "SELECT * FROM user WHERE Email ='$email'";
		$phonequery = "SELECT * FROM user WHERE Phone ='$phone'";
		$Cheak = "SELECT * FROM user WHERE Username ='$username'";
		$emailvalidation = mysqli_query($db,$emailquery);
		$phonevalidation = mysqli_query($db,$phonequery);
		$validate = mysqli_query($db,$Cheak);
		$cheaking = mysqli_num_rows($validate);
		if(mysqli_num_rows($emailvalidation)>0)
		{
            $email_error = "( * This Email Already Registered )";
		}
		else if(mysqli_num_rows($phonevalidation)>0)
		{
            $phone_error = "( * This Number is Already Registered )";
		}
		else if ( $cheaking > 0	) {
            $user_error = "( * This Username Already Registered )";
	
		}else{

			$sql = "INSERT INTO `user`(`Name`, `Username`, `Email`, `Phone`, `Password`, `Date`) VALUES ('$name','$username','$email','$phone','$password','$date')";
        
		    $insert =  mysqli_query($db,$sql);

            if ($insert === true) {
                # code...
                // $to_email = "ridchaudhari18@gmail.com";
                $sending_email = base64_decode($email);
                $subject = "Registration On Musister";
                $body = "Hi,".' '.base64_decode($name).' '.'You Are Successfully Registered On Musister  As User And  Your Verification Code Is '.$pass.' Thank You For Register';
                $headers = "From: krupalchaudhari2607@gmail.com";
                
                if ( mail($sending_email, $subject, $body, $headers)) {
                $_SESSION['Register_user'] = $username;
                $_SESSION['success'] = "Cheak Your Email For Verification Code";
                // setcookie('register')
                setcookie('register',$_SESSION['Register_user'],time()+300);
                header('Location:change-password-one');
                }
            }

        }

    }else{
        $email_cheal = "SELECT * FROM agency WHERE Email ='$email'";
		$phone_cheak = "SELECT * FROM agency WHERE Phone ='$phone'";
		$Cheak = "SELECT * FROM agency WHERE Username ='$username'";
		$email_validation = mysqli_query($db,$email_cheal);
		$phone_validation = mysqli_query($db,$phone_cheak);
		$validate_username = mysqli_query($db,$Cheak);
		 
		if(mysqli_num_rows($email_validation)>0)
		{
            $email_error = "( * This Email Already Registered )";
		}
		else if(mysqli_num_rows($phone_validation)>0)
		{
            $phone_error = "( * This Phone Already Registered )";
		}
		else if (mysqli_num_rows($validate_username) > 0	) {
            $user_error = "( * This Username Already Registered )";
	
		}else{

			$sql = "INSERT INTO `agency`(`Name`,`Username`, `Email`, `Agency_Name`, `Password`, `Phone`, `Date`,`Agreement`) VALUES ('$name','$username','$email','$djname','$password','$phone','$date','Pending')";
   
            $insert =  mysqli_query($db,$sql);

            if ($insert === true) {
                # code...
                // $to_email = "ridchaudhari18@gmail.com";
                $sending_email = base64_decode($email);
                $subject = "Registration On Musister";
                $body = "Hi,".' '.base64_decode($name).' '.'You Are Successfully Registered On Musister  As Agency And  Your Verification Code Is '.$pass.' Thank You For Register';
                $headers = "From: krupalchaudhari2607@gmail.com";
                
                if ( mail($sending_email, $subject, $body, $headers)) {
                $_SESSION['Register_agency'] = $username;
                setcookie('register_agency',$_SESSION['Register_agency'],time()+300);
                header('Location:Agency/change-password-one');
                }
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
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="Style/Login.css">
    <style>
        section .container .user .formbx form .error{
            color: red;
            font-size: 10px;
        }
    </style>
</head>
<body>

<section>
        <div class="container">
            <div class="user signinbx">

                <div class="formbx">
				<form action="register" method="POST">
                        <h2>Create an Account</h2>

                        <input type="text" name="Name"  placeholder="Full Name" value="<?php echo base64_decode($name); ?>">
                        <!-- <p class="error">(* You Are Not)</p> -->
                        <input type="email" name="email" placeholder="Email" value=" <?php echo base64_decode($email); ?> " >
                        <p class="error"> <?php echo $email_error; ?></p>
                        <input type="phone" name="phone" placeholder="Phone" value="<?php echo $phone; ?>" >
                        <p class="error"><?php echo $phone_error; ?></p>
                        <input type="text" name="username"  placeholder="Username" value="<?php echo base64_decode($username) ?>"  >
                        <p class="error"><?php echo $user_error; ?></p>
                        <select name="type">
                            <option value="User">User</option>
                            <option value="Agency">Agency</option>
                        </select>
                        <!-- <input type="date" name="dob" id=""> -->
                        <!-- <p class="error">(* You Are Not)</p> -->
                        <input type="submit" name="Register" value="Register">
                        <p class="signup">Already Have an Account ? <a href="login">Login</a> </p>
                    </form>
                </div>
				<div class="imgbx"><img src="Images/Registration.gif" alt="" style="object-fit: contain;"></div>
            </div>

        </div>
</section>
<script src="Javascript/Header.js"></script>
</body>
</html>