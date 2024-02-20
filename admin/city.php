<!DOCTYPE html>
<?php require_once '../includes/Admin_Auth.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Create_Slideshow.css">
    <title>Slideshow | Dashboard</title>
</head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2>Slideshow</h2>
    </section>
    
    <table>
        <thead>
            <th>Index</th>
            <th>City Name</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Action</th>
        </thead>
        <?php 
        $i=1;
        require_once '../Includes/config.php';
        $result = mysqli_query($db,"SELECT * FROM `city`");
      
        while ($res = mysqli_fetch_array($result)) { ?>
        
        <tbody>
            <tr>
                <td data-label="S.No"><?php echo $i++; ?></td>

                <td data-label="Name"> <?php echo $res['Name'] ?></td>
                <td data-label="lat"><?php echo $res['Latitude'] ?></td>
                <td data-label="lon"><?php echo $res['Longitude'] ?></td>
                <td>
                    <button class="Denied"><a href="delete?Del=<?php echo $res['ID'] ?>">Delete</a></button>
                </td>
        <?php } ?>
             </tr>
         </tbody>
         <!-- ?> -->
    </table>
    <button><a href="add-city">Add City</a></button>


</body>
</html>