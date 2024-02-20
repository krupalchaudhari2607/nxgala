<?php require_once '../includes/Admin_Auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Create_Slideshow.css">
    <link rel="stylesheet" href="Style/pop_up.css">
    <title>Client Data | Dashboard</title>
</head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2 data-text="Contact Us">Contact Us</h2>
    </section>
    
    <table>
        <thead>
            <th>Index.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Date</th>
        </thead>
        <?php 
                require_once '../Includes/config.php';

                $sql= "SELECT * FROM contact_us";
                $result = mysqli_query($db,$sql);
                $i=0;
                while($res = mysqli_fetch_array($result)){
                ?>
			
        <tbody>
            <tr>
                <td data-label="S.No"><?php echo $res['ID'] ?></td>

                <td data-label="Name"> <?php echo $res['Name'] ?></td>
                <td data-label="Email"><?php echo $res['Email'] ?></td>

                <td data-label="Phone"><?php echo $res['Phone'] ?></td>
                <td data-label="Message">
                <?php echo $res['Message'] ?>
                </td>
                <td data-label="Date"> <?php echo $res['Date']  ?></td>
                
            </tr>

        </tbody>
        
        <?php } ?>
    </table>

</body>

</html>