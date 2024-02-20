<?php
require_once '../includes/Admin_Auth.php'; 
require_once '../Includes/config.php';
 if ($db) {
     $result = mysqli_query($db,"SELECT * FROM agency_order");
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Create_Slideshow.css">
    <title>ORDER | Dashboard</title>
    <link rel="stylesheet" href="Style/pop_up.css">
  </head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2 data-text="Order">Order</h2>
    </section>
    
    <table>
        <thead>
            <th>Order.No</th>
            <th>Agency Username</th>
            <th>Username</th>
            <th>Type</th>
            <th>Price</th>
            <th>Action</th>
            <th>Adderess</th>
            <th>Order Date</th>
            <th>Booking Date</th>
        </thead>
        <?php 
        $i =1;
            while ($res = mysqli_fetch_array($result)) { ?>

        <tbody>
            <tr>
                <td data-label="S.No"><?php echo $i++; ?></td>

                <td data-label="Agency Username"><?php echo base64_decode($res['Agency_Username']); ?></td>
                <td data-label="Username"><?php echo ($res['Username']); ?></td>
                <td data-label="Type"><?php echo $res['Event_Type']; ?></td>
                <td data-label="Price"><?php echo $res['Price'] ?></td>
                <td data-label="Action"><?php echo $res['Status'] ?></td>
                
                <td data-label="Payment Method">
                <?php echo $res['Adderess'] ?>
                </td>
                <td data-label="Event_Date"><?php echo $res['Date_Of_Event'] ?></td>
                <td data-label="Booking Date"><?php echo $res['Date_Of_Booking'] ?></td>
            
            </tr>
            <?php } ?>
         </tbody>
         ?>
    </table>
    <script>
    function togglePopup(){
      document.getElementById("popup-1").classList.toggle("active");
    }
</script>
</body>
</html>