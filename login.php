<?php
session_start();
require_once 'Includes/config.php';


if (isset($_POST['Log_submit'])) {
    $log_user =  base64_encode(mysqli_real_escape_string($db,$_POST['Log_user']));	
	$log_pass = mysqli_real_escape_string($db,$_POST['Log_pass']);
	

    $Login_type = mysqli_real_escape_string($db,$_POST['Login_type']);
    if ($Login_type === 'User') {
        $Login_key = md5($log_pass);
		$query = "SELECT * FROM user WHERE Username ='$log_user' AND Password = '$Login_key'";
		$result= mysqli_query($db,$query);

		if (mysqli_num_rows($result) > 0) {
		$_SESSION['Username'] = $log_user;
        setcookie('uname',$_SESSION['Username'],time()+2592000);
		header('location:index');
        }else{
            $login_error = "Password or Username Wrong";
        }
    }elseif($Login_type === 'Agency'){
        $Login_key_agency = md5($log_pass);
		$query_agency = "SELECT * FROM agency WHERE Username ='$log_user' AND Password = '$Login_key_agency'";
		$result_agency= mysqli_query($db,$query_agency);
        $cres = mysqli_fetch_array($result_agency);

		if (mysqli_num_rows($result_agency) > 0) {
        if($cres['Agreement'] === "Agree"){
		$_SESSION['Username_Agency'] = $log_user;
        setcookie('uname_agency',$_SESSION['Username_Agency'],time()+2592000);
		header('location:Agency/Home');
        }else{
            $_SESSION['Username_Agency'] = $log_user;
            header('location:agency/agreement');
        }

        }else{
            $login_error = "Password or Username Wrong";
        }
    }elseif($Login_type === 'Admin'){
        $Login_key_admin = md5($log_pass);
		$query_admin = "SELECT * FROM admin WHERE Username ='$log_user' AND Password = '$Login_key_admin'";
		$result_admin= mysqli_query($db,$query_admin);

		if (mysqli_num_rows($result_admin) > 0) {
		$_SESSION['Username_admin'] = $log_user;
		header('location:admin/index');
        }else{
            $login_error = "Password or Username Wrong";
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
    <!-- <title>Document</title> -->
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="imgbx"><img src="Images/Login1.gif" alt=""></div>
                <div class="formbx">
                    <form action="login" method="POST">
                        <h2>Login</h2>
                        <?php
                        if (isset($_SESSION['Register_user'])) { ?>

                        <p class="success"><?php echo base64_decode($_SESSION['Register_user']); ?></p>
                        <?php } ?>
                        <?php
                        if (isset($login_error)) { ?>
                        <p class="error" style="font-size: 14px;"><?php echo "(* Your Username Or Password Wrong )" ?></p>
                        <?php } ?>
                        <input type="text" name="Log_user"  placeholder="Username">
                        <input type="password" name="Log_pass"  placeholder="Password">
                        <select name="Login_type">
                            <option value="User">User</option>
                            <option value="Agency">Agency</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <input type="submit" name="Log_submit" value="Login">
                        <p class="signup">Don't Have an Account ? <a href="register">Register</a> </p>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <script src="Javascript/Login.js"></script>
</body>
</html>     