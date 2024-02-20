<?php
 require_once '../includes/Admin_Auth.php'; 

 require_once '../Includes/config.php';
if ($db) {
    $result =mysqli_query($db,"SELECT * FROM events");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Create_Slideshow.css">
    <title>User Data | Dashboard</title>
</head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2>Event Data</h2>
    </section>
    
    <table>
        <thead>
            <th>Index.No</th>
            <th>Username</th>
            <th>Type</th>
            <th>Price</th>
            <th>Create Date</th>
            
          
        </thead>
        <?php 
        $i =1;
        while ($res = mysqli_fetch_array($result)) {  ?>
           
            <tbody>
            <tr>
                <td data-label="S.No"><?php echo $i++; ?></td>

                <td data-label="Agency_Username"><?php echo base64_decode($res['Username']); ?></td>
                <td data-label="Type"><?php echo $res['Type'] ?></td>

                <td data-label="Price"><?php echo $res['Price'] ?></td>
                <td data-label="Create Date"><?php echo $res['Date'] ?></td>               
              
            </tr>
            <?php } ?>
         </tbody>
         ?>
    </table>



</body>
</html>