<?php
require_once '../includes/Agency_Auth.php';
require_once '../Includes/config.php';
$uname = $_SESSION['Username_Agency'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compa  tible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NxGala | Agency</title>
    <link rel="shortcut icon" href="../Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Style/Tables.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .image-gallery{
            width: 90%;
            margin: auto;
            margin-top: 2rem;
            /* overflow: hidden; */
            overflow-x: hidden;
            /* overflow-y: scroll; */
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: space-between;
            padding-top: 1rem;
            height: auto;
        }
        .image-gallery::-webkit-scrollbar-track{
            display: none;
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
            width: 85%;
            height: 45px;
        }
        .image-gallery .images .content{
            display: flex;
        }
        .image-gallery .images .content .fa-trash{
            font-size: 35px;
            margin-top: 5px;
            text-align: center;
            justify-content: space-around;
        }
        form{
            border: 1 px solid gray;
            height: 100px;
        }
        @media(max-width:450px){
            .image-gallery{
                justify-content: center;
            }
            .image-add,.images{
                margin-top: 25px;
            }
        }
        @media(max-width:778px){
            .image-gallery{
            margin-top: 15%;
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

<div class="image-gallery">
        <a href="add-post" style="text-decoration: none;">
    <div class="image-add">
            <i class="fa fa-camera"></i><br>
            <span>Add Image</span>
        </div>
        </a>

        <?php
        $post_query = mysqli_query($db,"SELECT * FROM posts WHERE username='$uname'");
        while ($post_res = mysqli_fetch_array($post_query)) { ?>
        <div class="images">
        <?php echo "<img src = 'Posts/".$post_res['Image']."'>"; ?>
        <!-- <hr> -->
        <div class="content">
        <p><?php echo $post_res['Text'] ?></p>
        <form action="delete-post" method="GET" >
            <input type="hidden" name="Del" id="" value="<?php echo $post_res['ID'] ?>">
            <button class="fa fa-trash" style="background: none;border:none;outline:none;"></button>
        </form>
        </div>
    </div>
    <?php } ?>
</div>

</body>

</html>