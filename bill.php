<?php


    require_once 'Includes/config.php';
    $id = $_GET['ID'];
    $result=mysqli_query($db,"SELECT * FROM agency_order WHERE ID='$id'");
    $res =mysqli_fetch_row($result);
    $name=$res[2];    
    $asql= "SELECT Agency_Name FROM agency WHERE Username= '$name'";
    $Aname=mysqli_query($db,$asql);
    $arow=mysqli_fetch_row($Aname);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Bill</title> -->
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Style/Bill.css">
    <link rel="stylesheet" href="Style/Print.css" media="print">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 <div class="content-1">
        
    <button onclick="window.print();"id="print-btn" style="width: 90%; padding:10px 15px;margin:0 5% 0 5%; font-size:18px;" >Print &nbsp;&nbsp;<i class="fa fa-cloud-download"></i> </button>
    <div class="one">
    <div class="details">
    
    <h1> <span style="padding-top: 65px;"> <img src="Images/favicon.png" alt="" style="height: 50px;width:50px;line-height:100px;" > </span>NxGala</h1>
    <h3>Adderess : At.Po Unai, <br> Gokuldham Socitey (96) <br>Taluka:Vansda , Dist:Navsari <br>Pin:396590 </h3>
    <h3>Phone:7043165793 <br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           9825860174 </h3>
    <h3>Email:admin@nxgala.com </h3>
    </div>
    <div class="qrcode">
        <img src="Images/qrcode.png" alt="" >
    </div>
</div>
    <div class="two">
    <fieldset>
    <legend>Recipt</legend>

    
    <div class="content">
    <h4>Customer Name: <span><?php echo $res[6] ?></span></h4>
    <h4>Customer Username : <span><?php echo $res[1] ?></span></h4>
    <h4>Adderess : <span><?php echo $res[9] ?></span></h4>
    <h4>Booked Agency : <span>(<?php echo $res[3] ?>) (<?php echo base64_decode($res[2]); ?>)</span> </h4>
    <h4>Event Type : <span> <?php echo $res[5] ?> </span></h4>
    <h4>Event Price (&#8377;) : <span><?php echo $res[4] ?></span> </h4>
    <h4>Phone : <span><?php echo $res[8] ?></span></h4>
    <h4>Email : <span><?php echo $res[7] ?></span></h4>
    <h4>Event Date :<span> <?php echo $res[10] ?> </span></h4>
    <h4>Booked Date :<span> <?php echo $res[11] ?> </span></h4>
    <h4>Payment Method : <span><?php echo "COD(Cash)" ;?></span></h4>
    <h4>Order Status : <?php echo $res[12] ?></h4>
    
    </div>
    </fieldset>

    </div>
    <div class="three">
    <div class="content">
    <img src="Images/signature1.jpg" alt="">
    <hr>
    <h3>Autharized Signature</h3>
    </div>
    </div>
</div>
</body>
</html>