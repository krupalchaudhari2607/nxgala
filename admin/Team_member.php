<?php
 require_once '../includes/Admin_Auth.php'; 
 require_once '../Includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Create_Slideshow.css">
    
    <title>Client Data | Dashboard</title>
</head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2 data-text="Client Data">Client Data</h2>
    </section>
    
    <table>
        <thead>
            <th>Index.No</th>
            <th>Name</th>
            <th> Profession</th>
            <th>Date Of Joining</th>
        </thead>
        <?php

        $result = mysqli_query($db,"SELECT * FROM team_member");
        $i =1;
        while ($res = mysqli_fetch_array($result)) { ?>
        <tbody>
            <tr>
                <td data-label="S.No"><?php echo $i++; ?></td>

                <td data-label="Name"><?php echo $res['Name'] ?></td>
                <td data-label="Profession"><?php echo $res['Profession'] ?></td>
                <td data-label="Date"><?php echo $res['Date'] ?></td>
                
            </tr>
            <?php } ?>
         </tbody>
         
    </table>
    <button><a href="Add_team_member.php">Add Team Member</a></button>



</body>
</html>