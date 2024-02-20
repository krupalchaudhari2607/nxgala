<?php
require_once 'Includes/User_Auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Style/Tables.css">
    <link rel="stylesheet" href="Style/Header.css">
    <style>
        table {
            margin-top: 5%;
        }
        .Home{

            text-decoration: none;
            color: #000;
            position: absolute;
            width: auto;
            margin-top: 10px;
            border:none;
            border-radius: 10px;
            text-align: center;
            background: #ccc;
            padding: 10px 15px;
        }
        table a{
            text-decoration:none;
            color:red;
            border:.5px solid red;
            padding:2px;
        }
        .empty{
        height:250px;width:auto;position:absolute;top:0;left:0;right: 0;bottom: 0;margin: auto;
      }
        @media(max-width:778px){
        
        .empty{
        height:170px;width:auto;position:absolute;top:0;left:0;right: 0;bottom: 0;;
      }
      table {
            margin-top: 18%;
        }
      }
      @media(max-width:450px){
        
       
      table {
            margin-top: 26%;
        }
      }
    </style>
</head>
<body>
    
    <?php
    require_once 'Includes/Header.php';
    session_start();
    require_once 'Includes/config.php';
    $uname=base64_decode($_SESSION['Username']);
    $sql= "SELECT * FROM agency_order WHERE Username= '$uname'";
    $result = mysqli_query($db,$sql);
    $i=1;
    $order_count = mysqli_query($db,"SELECT count(*) from agency_order WHERE Username = '$uname'");
    ?>
    <?php if (mysqli_num_rows($order_count) > 0) { ?>
<table>
        <caption>Order</caption>
        <thead>
            <th>Order.No</th>
            <th>Name</th>
            <th>Agency Name</th>
            <th>Event</th>
            <th>Price</th>
            <th>Adderess</th>
            <th>Date Of Event</th>
            <th>Date Of Booking</th>
            <th>Status</th>
            <th>View Bill</th>
        </thead><?php 
              
                while($res = mysqli_fetch_array($result)){
                ?>
			
        <tbody>
            <tr>
                <td data-label="S.No"><?php echo $i++;?></td>

                <td data-label="Name"> <?php echo  $res[6] ?></td>
                <td data-label="Name"> <?php echo  $res[4] ?></td>
                <td data-label="Event Type"><?php echo $res[5] ?></td>

                <td data-label="Price"><?php echo $res[4] ?></td>
                <td data-label="Adderess"><?php echo $res[9] ?></td>
                <td data-label="Event Date"><?php echo $res[10] ?></td>
                <td data-label="DAte Of Booking"> <?php echo $res[11]  ?></td>
                <td data-label="Status">
                <?php echo $res[12]  ?>
                </td>
                <td><a href="Bill?ID=<?php echo $res[0] ?>">View Bill</a></td>
            </tr>


        </tbody>
        
            <?php } ?>

    </table>
    <!-- <a href="index" class="Home">Go To Home Page</a> -->
    <?php }else{ ?>
        <img src="Images/empty.gif" alt="" class="empty"> 
        <?php } ?>
    <script src="Javascript/Header.js"></script>
</body>
</html>