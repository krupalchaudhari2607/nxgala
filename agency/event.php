<?php
require_once '../includes/Agency_Auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Dashboard | Agency</title> -->
    <title>NxGala | Agency</title>
    <link rel="shortcut icon" href="../Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Style/Tables.css">
 <style>
          .empty{
        height:250px;width:auto;position:absolute;top:0;left:0;right: 0;bottom: 0;margin: auto;
      }
    #img_div{
        width: 80%;
        padding: 5px;
        margin: 15px auto;
        border: 1px solid black;
    }
    #img_div:after{
        content: "";
        display: block;
        clear: both;
    }
    img{
        float: left;
        margin: 5px;
        width: 200px;
        height: 200px;
    }
    .Denied ,
    .Accept,.Coupen{
        display:inline-block;
        padding:5px 8px;
        text-decoration:none;
    }
    .Denied a,
    .Accept a,
    .Coupen a{
        text-decoration:none;
    }
    @media (max-width:450px){
        img{
            height: 100px;
            width: 100px;
        }
    }
    @media(max-width:778px){
        .order{
            margin-top: 18%;
        }
    }

    </style>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <?php require_once '../includes/Agency_Header.php' ?>
    <div class="order">
        <?php
            require_once '../Includes/config.php';
            $uname=$_SESSION['Username_Agency'];
            $sql= "SELECT * FROM events WHERE Username= '$uname'";
            $result = mysqli_query($db,$sql);
            $i=1;
            $event_count = mysqli_query($db,"SELECT count(*) from events WHERE Username = '$uname'");
            ?>
    <?php if (mysqli_num_rows($event_count) < 0) { ?>
    <table>
        <caption>Events</caption>
        <thead>
            <th>Event.No</th>
            <th>Image</th>
            <th>Username</th>
            <th>Price</th>
            <th>Description</th>
            <th>Type</th>
            <th>Date</th>
            <th>Action</th>
        </thead>
        
        <!-- <a href="Create.php" style="text-decoration:none;padding:5px 8px;background:#96ca5a;position:relative;display:block;text-align:center;">Create Event</a> -->
        <?php 

                while($res = mysqli_fetch_array($result)){
                ?>
			
        <tbody>
            <tr>
                <td data-label="S.No"><?php echo $i++;?></td>

                <td data-label="Image"> <?php echo "<img src = 'Images/".$res['Image']."'>"; ?></td>
                <td data-label="Name"><?php echo base64_decode($res['Username']) ?></td>

                <td data-label="Price"><?php echo $res['Price'] ?></td>
                <td data-label="Description"><?php echo $res['Description'] ?></td>
                <td data-label="Type"> <?php echo $res['Type']  ?></td>
                <td data-label="Date"> <?php echo $res['Date']  ?></td>
                <td data-label="Action">
                    <button class="Accept"><a href="Edit_Event?n=<?php echo $res['ID']?>">Edit</a></button>
                    <button class="Denied"><a href="delete?Del=<?php echo $res['ID'] ?>" onclick="alert('You Want To Delete Event?');">Delete</a></button>
                    <!-- <button class="Denied"><a href="Create_Coupen?Edit=<?php echo $res['ID'] ?>" onclick="alert('You Want To Add Coupen Code?');">Code</a></button> -->
                    
                </td>
            </tr>

        </tbody>
        
            <?php } ?>
    </table>
    <?php }else{ ?>
        <img src="../Images/empty.gif" alt="" class="empty"> 
        <?php } ?>
    </div>
  <script src="Javascript/index.js"></script>
</body>
</html>