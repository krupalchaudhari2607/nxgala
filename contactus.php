<?php
require_once 'Includes/config.php';
 $errors=array();
/*
 if($db){
     echo "Connection Done";
 }else{
     echo "Connection Cheak";
 }*/
 if (isset($_POST['Send'])) {
     
     $name= mysqli_real_escape_string($db,$_POST['name']);
     $email=mysqli_real_escape_string($db,$_POST['email']);
     $phone=mysqli_real_escape_string($db,$_POST['phone']);
     $message=mysqli_real_escape_string($db,$_POST['Message']);
     $date= date("Y-m-d h:i:s");
     
     $errors =array();


     // VAlidation

     if (empty($name)) {
         array_push($errors, "Name IS Required");
     }
     
     if (empty($phone)) {
        array_push($errors, "Name IS Required");
    }
     

     $sql = "INSERT INTO `contact_us`( `Name`, `Email`, `Phone`, `Message`, `Date`) VALUES ('$name','$email','$phone','$message','$date')";

     $result = mysqli_query($db,$sql);
     if ($result===true) {

         header('location:index');
     }
 }
    require_once 'includes/User_Auth.php';
 
?>
<?php require_once 'includes/Header.php' ?>
<?php
require_once 'includes/logout.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Style/Contact_Us.css">
    <link rel="stylesheet" href="Style/Header.css">
    <style>
        .contact{
            padding-top:100px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <?php 
    $uname = $_SESSION['Username'];
    $Details = mysqli_query($db,"SELECT * FROM user WHERE Username='$uname'");
    $res = mysqli_fetch_array($Details);
    ?>
    <div id="content"></div>
    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <div class="border"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, dolores quis vero reprehenderit quisquam voluptatibus minima voluptatum dolorum assumenda rerum harum fuga odit accusantium deserunt velit aliquam deleniti iure aspernatur!</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Adderess</h3>
                        <p>4671 Sugar Camp Road<br>Dolvan ,Taluka:Dolvan ,District :tapi <br>
                        Pin Code:394635</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>Krupalchaudhari2607@gmail.com</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+91-7043165793 <br>  
                           +91-9825860174</p>
             </div>
                </div>
            </div>
            <div class="contactForm">
                <h2>Send Message</h2>
                <form action="contactus" method="post">
                    <div class="inputBox">
                        <input type="text" name="name" required value="<?php echo base64_decode($res['Name']).base64_decode($res['Surname']); ?>">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" required value="<?php echo base64_decode($res['Email']); ?>">
                        <span>E-mail Id</span>
                    </div>
                    <div class="inputBox">
                        <input type="phone" name="phone" required value="<?php echo $res['Phone'] ?>">
                        <span>Phone</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="Message"  cols="30" rows="5" required></textarea>
                        <span>Write A Message </span>
                    </div>
                    <div class="inputBox">
                    <button type="submit" name="Send"> Send </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="Javascript/Header.js"></script>
</body>
</html>