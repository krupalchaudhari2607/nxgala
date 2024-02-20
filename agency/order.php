<?php
require_once '../includes/Agency_Auth.php';
require_once '../Includes/config.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compa  tible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Dashboard | Agency</title> -->
    <title>NxGala | Agency</title>
    <link rel="shortcut icon" href="../Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Style/Tables.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .empty{
        height:250px;width:auto;position:absolute;top:0;left:0;right: 0;bottom: 0;margin: auto;
      }
      @media(max-width:778px){
        .order{
          margin-top: 18%;
        }
        .empty{
        height:170px;width:auto;position:absolute;top:0;left:0;right: 0;bottom: 0;;
      }
      }
    </style>
</head>
<body>
    <?php require_once '../includes/Agency_Header.php' ?>
    <?php 
    if (isset($_SESSION['success'])) { ?>
      <div class="success" Style="width:100%;height:20px;position:relative;text-align:center;border:1px solid green;color:#000;margin-top:8px;background:rgba(64,233,21);">
      <p><?php echo $_SESSION['success'] ;
              unset($_SESSION['success']);
              ?></p>
    </div>
    <?php } ?>
    <div class="order">
      <?php
                      $db = mysqli_connect('localhost','root','','dream_project');
                      $uname=$_SESSION['Username_Agency'];
                      $sql= "SELECT * FROM agency_order WHERE Agency_Username= '$uname'";
                      $result = mysqli_query($db,$sql);
                      $i=1;
                      $order_count = mysqli_query($db,"SELECT count(*) from agency_order WHERE Agency_Username = '$uname'");
      ?>
      <?php if (mysqli_num_rows($order_count) > 0) { ?>
         
        <table>
        <caption>Order</caption>
        <thead>
            <th>Order.No</th>
            <th>Name</th>
            <th>Adderess</th>
            <th>Price</th>
            <th>Event Type</th>
            <th>Date OF Order</th>
            <th>Date Of Booking</th>
            <th>Action</th>
            <th>Send Me</th>
            <th>Pay To Company</th>
        </thead>
        <?php 

                while($res = mysqli_fetch_array($result)){
                ?>
			
        <tbody>
            <tr>
                <td data-label="S.No"><?php echo $i++;?></td>

                <td data-label="Name"> <?php echo  $res[6] ?></td>
                <td data-label="Adderess"><?php echo $res[9] ?></td>
                <td data-label="Price"><?php echo $res[4] ?></td>
                <td data-label="Event Type"><?php echo $res[5] ?></td>
                <td data-label="Date Of Event"> <?php echo $res[10]  ?></td>
                <td data-label="Date Of Booking"> <?php echo $res[11]  ?></td>
                <td data-label="Action">
                    <?php 

                        if (isset($_REQUEST['act']) && $_REQUEST['act'] === 'accept') {
                          $id=$_REQUEST['o_id'];
                          $in = mysqli_query($db,"UPDATE `agency_order` SET `Status`='Accept',`payment_from_agency`='Pending' WHERE `ID`='$id'");                      
                         
                        }

                        if (isset($_REQUEST['act']) && $_REQUEST['act'] === 'reject') {
                          $id=$_REQUEST['o_id'];
                          $in = mysqli_query($db,"UPDATE `agency_order` SET `Status`='Reject',`payment_from_agency`='--'  WHERE `ID`='$id'");
                        }
                      switch ($res[12]) {
                        case 'Reject':
                          echo "Rejected";
                          break;

                          case 'Accept':
                            echo "Accepted";
                            break;

                            case 'Pending':
                              echo "
                              <form action='Order.php?act=accept' method='POST'>
                              <input type='hidden' name='o_id'  value='".$res[0]."'/>
                                 <button type='submit' value='Accept' onclick='greet();' style='padding:5px;border:1px solid black;'>Accept</button>
                              </form > | 
                              <form action='Order.php?act=reject' method='POST'>
                              <input type='hidden' name='o_id' value='".$res[0]."'/>
                              <button  type='submit' value='Reject' style='padding:5px;border:1px solid black;'>Reject</button>
                            </form>
                              ";
                              break;
                      }
                    ?>
                </td>
                <td data-label="Send Me">
                  <?php
                  if ($res[13] == "Pending" && $res[12] == "Accept") {?>
                  <form action="Send_Email?<?php echo $res[0] ?>" method="GET">
                    <input type="hidden" name="ID" value="<?php echo $res[0] ?>">
                    <button style='padding:5px;border:1px solid black;'>Send Me</button>
                  </form>
                  <?php } ?>
                  <?php 
                  if ($res[13] == "SENT") { ?>
                    <?php echo $res[13] ?>
                  <?php } ?>
                   
                </td>
                <td data-label="Pay To Company">
                  <?php
                    if ($res[14] === "Pending") { ?>
                      <form action="Payment/TxnTest.php" method="POST">
                        <?php
                            if ($res[4] < 10000) {
                              $pay_price = ( $res[4] * 10 ) / 100;
                            }else{
                              $pay_price = "1200";
                            }
                        ?>
                        <input type="hidden" name="pay_price" value="<?php echo $pay_price; ?>">
                        <button style='padding:5px;border:1px solid black;'>Pay</button>
                      </form>
                  <?php }else { ?>
                    
                    <?php } ?>
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

  <script>
    function greet() {
      alert('Are You Sure Want To Accept Request?');

    }
    </script>
    
</body>
</html>