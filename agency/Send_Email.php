<?php 

require_once '../Includes/config.php';

$id = $_GET['ID'];

$esql = mysqli_query($db,"SELECT * FROM agency_order WHERE ID='$id'");

$result = mysqli_fetch_array($esql);
$agency_username = $result['Agency_Username'];
$asql = mysqli_query($db,"SELECT * FROM agency WHERE Username='$agency_username'");
$a_result = mysqli_fetch_array($asql);
$agency_name = base64_decode($a_result['Name']);

    $agency_email =  base64_decode($a_result['Email']);
   $subject = "Order Details";
   $body = "Hello,".' '.$agency_name.' '."Congratulations".' '."You Had Accept The Order Request Of".$result['Name'].' '."Here Is The Details Of User".' '."Email : ".$result['Email'].' '."Phone no : ".$result['Phone'].' '."Adderess".$result['Adderess'].' '."Event Date : ".$result['Date_Of_Event'].' '."Thank You For Accepting The Order";
      $headers = "From: krupalchaudhari2607@gmail.com";
 
   if ( mail($agency_email, $subject, $body, $headers)) {
      $update = mysqli_query($db,"UPDATE `agency_order` SET `Email_Status`='SENT' WHERE ID='$id'");
      header('location:Order');
   } else {
      echo("Email sending failed...");
   }



?>