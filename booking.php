<?php
require_once 'Includes/config.php';
require_once 'Includes/User_Auth.php';
$id = $_GET['i'];
session_start();
$uname  = $_SESSION['Username'];
$errors = array();
$user_query = mysqli_query($db,"SELECT * FROM user WHERE Username='$uname'");
$user_data = mysqli_fetch_array($user_query);
$event_query = mysqli_query($db,"SELECT * FROM events WHERE ID='$id'");
$event_data = mysqli_fetch_array($event_query);
$agency_username = $event_data['Username'];
$agency_query = mysqli_query($db,"SELECT * FROM agency WHERE Username = '$agency_username'");
$agency_data = mysqli_fetch_array($agency_query);
$date= date("Y-m-d h:i:s");
$Today= date("Y-m-d");
if (isset($_POST['book'])) {
    $user= mysqli_real_escape_string($db,$_POST['username']);
    $agency= mysqli_real_escape_string($db,$_POST['Agency_username']);
    $name= mysqli_real_escape_string($db,$_POST['Name']);
    $email= mysqli_real_escape_string($db,$_POST['Email']);
    $phone= mysqli_real_escape_string($db,$_POST['Phone']);
    $price= mysqli_real_escape_string($db,$_POST['price']);
    $type= mysqli_real_escape_string($db,$_POST['event_type']);
    $Adderess= mysqli_real_escape_string($db,$_POST['Adderess']);
    $agency_name= mysqli_real_escape_string($db,$_POST['Agency_name']);
    $status=  "Pending";
    $date= mysqli_real_escape_string($db,$_POST['Event_Date']);
    $email_status = "Pending";
    $Date= date("Y-m-d h:i:s");


    $b_sql = mysqli_query($db,"SELECT * FROM `agency_order` WHERE `Agency_Username`='$agency' AND `Date_Of_Event`='$date'");
    
    if (mysqli_num_rows($b_sql) > 0) {
      array_push($errors,"Already Booked On This Date");
      $book_error = "Already Booked On This Date";
      header('location:booking');
    }else{
      if (count($errors)==0) {
        $sql="INSERT INTO `agency_order`( `Username`, `Agency_Username`,`Agency_Name`,`Price`, `Event_Type`, `Name`, `Email`, `Phone`, `Adderess`, `Date_Of_Event`, `Date_Of_Booking`, `Status`,`Email_Status`) VALUES ('$user','$agency','$agency_name','$price','$type','$name','$email','$phone','$Adderess','$date','$Date','$status','$email_status')";
        mysqli_query($db,$sql);
        header('location:Order');
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
    <link rel="stylesheet" href="Style/Booking.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="first">
                <img src="Agency/Images/<?php echo $event_data['Image'] ?>" alt="">
                <div class="details">
                
                <h2><?php echo ($agency_data['Agency_Name']); ?></h2>
                <h2>Price: &#8377; <?php echo $event_data['Price'] ?>/-</h2>
                <h2>Event Type: <?php echo $event_data['Type'] ?></h2>
                
                </div>
            </div>
            <div class="second">    
                <form action="booking" method="POST">
                    <h2>Booking Now</h2>
                    <?php
                    if (isset($_SESSION['book_error'])) { ?>
                    <p style="border: 0.5px solid red;background: rgb(252, 132, 132);"><?php echo $_SESSION['book_error'] ?></p>
                    <?php } ?>
                    <input type="hidden" name="Agency_username" value="<?php echo $event_data['Username'] ?>" required>
                    <input type="hidden" name="Agency_name" value="<?php echo ($agency_data['Agency_Name']); ?>">
                    <input type="hidden" name="price" value="<?php echo $event_data['Price'] ?>">
                    <input type="hidden" name="event_type" value="<?php echo $event_data['Type'] ?>">
                    <input type="hidden" name="username" value="<?php echo base64_decode($uname); ?>">
                    <input type="text" name="Name" value="<?php echo base64_decode($user_data['Name']); ?>" readonly>
                    <input type="text" name="Phone" value="<?php echo ($user_data['Phone']); ?>" readonly>
                    <input type="text" name="Email" value="<?php echo base64_decode($user_data['Email']); ?>" readonly>
                    <input type="Date" name="Event_Date" min="<?php echo  $Today;?>" required>
                    <textarea name="Adderess" id="" cols="30" rows="5"placeholder="Adderess" required></textarea>
                    <input type="submit" name="book" value="Book">
                </form>
            </div>
        </div>
    </section>
</body>
</html>