<?php 
$id = $_GET['n'];

error_reporting(0);
require_once 'Includes/Header.php';
$errors = array();

if (isset($_POST['ADD_COMMENT'])) {
  require_once 'includes/User_Auth.php';
  $c_name = $_SESSION['username'];
  $usql = mysqli_query($db,"SELECT * FROM user WHERE Username='$c_name'");
  $user = mysqli_fetch_row($usql);
  $name =base64_decode($user[1]);
  $date= date("Y-m-d h:i:s");
  $name= mysqli_real_escape_string($db,$_POST['name']);
  $Message= mysqli_real_escape_string($db,$_POST['comment']);
  if (empty($Message)) {
    array_push($errors,"Please Write Before Submit");
  }
  if (count($errors) == 0) {
    # code...
    $insert_query = mysqli_query($db,"INSERT INTO `comment`(`Event_Id`, `Name`, `Comment_Message`, `Date`) VALUES ('$id','$name','$Message','$date')");
    if ($insert_query == true) {
      $_SESSION['COMMENT'] = "Comment Added Successfully";
      header('location:index');
    }
  }



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta property="og:title" content="your_link_title">
    <meta property="og:image" content="your_image_url">
    <link rel="stylesheet" href="Style/Product_Details.css">
    <link rel="stylesheet" href="Style/Header.css">
    <link rel="stylesheet" href="Style/Footer.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <title>Document</title> -->
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <style>
      .comment{
        position: relative;
        margin-top:3rem;
        padding-left:14%;
        margin-bottom:3rem;
        
      }
      .comment .comment-area{
        width:80%;
        resize:none;
        font-size:1.3rem;
        padding:5px;
        border-radius:.5rem;
      }
      .comment form .btn{
        padding:5px 8px;
        cursor: pointer;
        border-radius:.5rem;
        background:#256eff;
        color:#fff;
        font-size:1rem;
        font-weight:300;
      }
      .view-comment{
        width:80%;
        margin-top:1.5rem;
        border:1px solid #777;
        padding:9px;
        border-radius:.8rem;
      }
      .view-comment .name-comment{
        color:#000;
        border-bottom:1px solid #000;
        margin-bottom:.8rem;
      }
      .view-comment .comment-message{
        color:#ccc; 
        margin-top:.8rem;
        display:flex;
        color:#767a79;
        flex-wrap:wrap;
      }
      .image-gallery{
            width: 90%;
            margin: auto;
            margin-top: 2rem;
            overflow: hidden;
            overflow-y: scroll;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-between;
            padding-top: 1rem;
            height: auto;
            max-height: 85vh;
        }
        .image-gallery .image-add,
        .image-gallery .images{
            width: 250px;
            margin-top: 25px;
            height: 250px;
            border: 1px dotted black;
            cursor: pointer;
        }
        .image-gallery .image-add .fa-camera{
            font-size: 100px;
            color: gray;
            margin-top: 75px;
            margin-left: 75px;
            position: relative;
            /* margin-left: ; */
        }
        .image-gallery .image-add span{
            font-size: 25px;
            color: gray;
            margin-left: 70px;
        }

        .image-gallery .images img{
            height: 200px;
            width: 250px;
        }
        .image-gallery .images p{
            color: gray;
            display: flex;
            width: 100%;
            height: 45px;
        }
        .image-gallery .images .content{
            display: flex;
        }
        @media(max-width:450px){
            .image-gallery{
                justify-content: center;
            }
            .image-add,.images{
                margin-top: 25px;
            }
            .card-wrapper{
             margin-top: 22%;
           }
        }

        @media(max-width:778px){
           .card-wrapper{
             margin-top: 15%;
           }
        }
    </style>
</head>
<body>

<?php
    
    // to get events details

    $esql="SELECT * FROM events WHERE events.ID = '$id'";
    $eventdata = mysqli_query($db,$esql);
    $resulte=mysqli_fetch_row($eventdata);
    $name=$resulte[1];


    // to get agency's details
    $asql= "SELECT * FROM agency WHERE Username= '$name' ";
    $agencydata = mysqli_query($db,$asql);
    // if($agencydata == true)
    // {
    //  
      //echo "there is no error";
    // }
    // else{
    //     echo "there is error";
    // }
    $result_a= mysqli_fetch_row($agencydata);
    $order_count = mysqli_query($db,"SELECT COUNT(*)Agency_Username FROM `agency_order`");
    $order_result = mysqli_fetch_row($order_count);
    
?>
  
    <div class = "card-wrapper">
        <div class = "card">
          <!-- card left -->
          <div class = "product-imgs">
            <div class = "img-display">
              <div class = "img-showcase">       
                <img src="Agency/Images/<?php echo $resulte[4] ?>" alt="">
              </div>
            </div>
          </div>
          <!-- card right -->
          <div class = "product-content">
            <h2 class = "product-title"><?php echo ($result_a[5]); ?></h2>
            <!-- <div class = "product-rating">
              <i class = "fa fa-star"></i>
              <i class = "fa fa-star"></i>
              <i class = "fa fa-star"></i>
              <i class = "fa fa-star"></i>
              <i class = "fa fa-star-half-alt"></i>
              <span>4.7(21)</span>
            </div> -->
      
            <div class = "product-price">
              <p class = "last-price">Old Price: <span>&#8377;<?php echo $resulte[2] ?></span></p>
              <p class = "new-price">New Price: <span>&#8377;<?php echo $resulte[2] ?></span></p>
            </div>
      
            <div class = "product-detail">
              <h2>about this Events: </h2>
              <p><?php echo $resulte[3] ?></p>
              <ul>
                <li>Payment Method: <span>COD(Cash)</span></li>
                <li>Category: <span><?php echo $resulte[5] ?></span></li>
                <li>Order Handeled: <span><?php echo $order_result[0] ?></span></li>
                <li>Order Cancellation: <span>You Can't Cancel Your Order</span></li>
                <li>Adderess: <span><?php echo $result_a[8]; ?></span></li>
              </ul>
            </div>
      
            <div class = "purchase-info">
                <!-- <form action="" method="POST">
              <input type = "text" placeholder="Apply Coupen Code Here" name="code">
              <button type = "submit" class = "btn" style="background: blue;">Apply</button>
              </form> -->
              <br>
              <a href="booking?i=<?php echo $id ?>" class="btn" style="text-decoration: none;">Book Now</a>
            </div>
      
            <div class = "social-links">
              <p>Share At: </p>
              <a href = "https://www.facebook.com/sharer/sharer.php?u=http://localhost/Musister/productdetails">
                <i class = "fa fa-facebook-f"></i>
              </a>
              <a href = "#">
                <i class = "fa fa-twitter"></i>
              </a>
              <a href = "#">
                <i class = "fa fa-instagram"></i>
              </a>
              <a href = "#">
                <i class = "fa fa-whatsapp"></i>
              </a>

            </div>
          </div>
        </div>
    </div>
    <br><br>
      
    <h1 style="margin-bottom:1rem;text-align:center">Image Gallery</h1>  
    <?php
        $post_query = mysqli_query($db,"SELECT * FROM posts WHERE username = '$result_a[3]'");
        if (mysqli_num_rows($post_query) > 0) { ?>
    <div class="image-gallery">
      

        <?php while ($post_res = mysqli_fetch_array($post_query)) { ?>
        <div class="images">
        <?php echo "<img src = 'Agency/Posts/".$post_res['Image']."'>"; ?>
        <!-- <hr> -->
        <div class="content">
        <p><?php echo $post_res['Text'] ?></p>
     
        </div>
    </div>
    <?php } ?>
</div>

<?php } else{ ?>
  <h3 style="text-align: center;">No More Images </h3>
<?php } ?>

    <div class="comment">
      <h1 style="margin-bottom:1rem;">Add Comment</h1>
      <form action="" method="POST" >
      <input type="hidden" name="name" id="" class="btn" value="name">
        <textarea name="comment" id="" cols="30" rows="5" placeholder="Write Comment Here" class="comment-area" style="border: 1px solid #ccc;"></textarea><br>
        <input type="submit" name="ADD_COMMENT" id="" class="btn" value="Add Comment">
      </form>
      <h1 style="margin-top:1rem;">View Comment</h1>
      <?php 
      // $db = 
      
      $comment_view = mysqli_query($db,"SELECT * FROM comment WHERE Event_Id='$id'");
      while ($comment_res = mysqli_fetch_array($comment_view)) { ?>
        <div class="view-comment">
        <span class="name-comment"><?php echo $comment_res['Name'] ?> , <i class="fa fa-clock-o"></i> <?php echo $comment_res['Date'] ?></span>
        <p class="comment-message"><?php echo $comment_res['Comment_Message'] ?></p>
        </div>
      <?php } ?>

     
    </div>
      <?php require_once 'Includes/Footer.php'; ?>
    <script src="Javascript/Header.js"></script>
</body>
</html>