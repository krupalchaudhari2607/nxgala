<?php
$errors = array();
// require_once ''
require_once '../Includes/config.php';
if (isset($_POST['Create'])) {

    
    $name = $_POST['name'];
    $profession =$_POST['profession'];
    $about = $_POST['About'];
    $linkdin=$_POST['linkdin'];
    $insta=$_POST['insta'];
    $Facebook = $_POST['facebook'];
    $Twitter= $_POST['twitter'];
    $date= date("Y-m-d h:i:s");
      

    $target = "Team_Member/".basename($_FILES['image']['name']);

        $image= $_FILES['image']['name'];
        
        $sql = "INSERT INTO `team_member`(`Name`, `Profession`, `About`, `Linkdin`, `Instagram`, `Facebook`, `Twitter`, `Image`, `Date`) VALUES ('$name','$profession','$about','$linkdin','$insta','$Facebook','$Twitter','image','$date')";
         mysqli_query($db,$sql);



    if ( move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
    header('Location:Team_member.php');  
    }

}

?>
<?php require_once '../includes/Admin_Auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Create_Slideshow.css">
    <title>Events | Dashboard</title>
</head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2>Add Team Member</h2>
    </section>
    
    <div class="contactForm">
        <h2>Add Team Member</h2>
        <form action="Add_team_member.php" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
                <input type="text" name="name" required >
                <span>Name</span>
            </div>
            
            <div class="inputBox">
                <input type="text" name="profession" required >
                <span>Profession</span>
            </div>
            <div class="inputBox">
                <input type="text" name="About" required >
                <span>About Him</span>
            </div>


            <h2>Social Media Links</h2>
            <hr>
            <div class="inputBox">
                <input type="Phone" name="linkdin" required >
                <span>Linkdin</span>
            </div>
            <div class="inputBox">
                <input type="Phone" name="insta" required >
                <span>Instagram</span>
            </div>
            <div class="inputBox">
                <input type="Phone" name="facebook" required >
                <span>Facebook</span>
            </div>
            <div class="inputBox">
                <input type="Phone" name="twitter" required >
                <span>Twitter</span>
            </div>
            <hr>


            <div class="inputBox">
                <span>Image</span> <br>
                <input type="file" name="image" >
            </div>
            <div class="inputBox">
            <button type="submit" name="Create" class="add"> Add </button>
            </div>
        </form>
    </div>


</body>
</html>