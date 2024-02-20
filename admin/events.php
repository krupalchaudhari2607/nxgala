<!DOCTYPE html>
<?php 
require_once '../includes/Admin_Auth.php';
require_once '../Includes/config.php';
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Category_event.css">
    <title>Document</title>
    <style>
        .content .row .card,
        .content .row a{
    width: 22.5%;
    text-align: center;
    text-decoration: none;
    transition: 0.3s;
    border-radius: 10px;
    outline: none;
    cursor: pointer;
    margin-top: 30px;
    height: auto;
    background: #ddd;
}
    </style>
</head>
<body>
    
    
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2>Category</h2>
    </section>
    <a href="Create_events" style="text-decoration:none;padding:15px 8px;background:#96ca5a;position:relative;display:block;text-align:center;">Create Category</a>
    <section class="content">
        <!-- <div class="border"></div> -->
            <div class="row">
            <?php 
            


            $sql= "SELECT * FROM category";
            $result = mysqli_query($db,$sql);
            $i=0;
            while($res = mysqli_fetch_array($result)){
            ?>

                <div class="card">
                    <div class="image">
                        
                        <?php echo "<img src = 'Upload/".$res['Image']."'>"; ?>
                    </div>
                    <div class="title">
                        <h1><?php echo $res['Name'] ?></h1>
                        <br>
                        <a href="" style="position:relative;padding:5px 8px;background:#ccc; color:f7f7f7;">Delete</a>
                    </div>
                </div>
            <!-- </a> -->

                <?php } ?>         

                
               
               
            </div>
    </section>

</body>
</html>