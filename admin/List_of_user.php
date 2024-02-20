<?php 
 require_once '../includes/Admin_Auth.php'; 
 require_once '../Includes/config.php';
if ($db) {
    $result = mysqli_query($db,"SELECT * FROM user");
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
    <section class="one" style="background-image:url('Image/images.png');">
        <h2 data-text="Client Data">User Data</h2>
    </section>
    <table>
        <thead>
            <th>Index.No</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Joining Date</th>
          
        </thead>
        <?php
        $i=1;
        while ($res = mysqli_fetch_array($result)) { ?>
        <tbody>
            <tr>
                <td data-label="S.No"><?php echo $i++; ?></td>
                <td data-label="Username"><?php echo base64_decode($res['Username']); ?></td>
                <td data-label="Name"><?php echo base64_decode($res['Name']); ?></td>

                <td data-label="Email"><?php echo base64_decode($res['Email']); ?></td>
                <td data-label="Phone"><?php echo ($res['Phone']); ?></td>
                <td data-label="Joining Date"> <?php echo ($res['Date']); ?></td>
            </tr>
            <?php } ?>
         </tbody>
         ?>
    </table>
</body>
</html>