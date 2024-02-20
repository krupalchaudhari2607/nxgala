<?php
require_once '../includes/Agency_Auth.php';
require_once '../Includes/config.php';
$uname=$_SESSION['Username_Agency'];
$result=mysqli_query($db,"SELECT * FROM agency WHERE Username= '$uname'");
$res=mysqli_fetch_row($result);
$errors =array();
if (isset($_POST['Edit'])) {
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $Adderess = mysqli_real_escape_string($db,$_POST['Adderess']);
    $Description = mysqli_real_escape_string($db,$_POST['Description']);
    $djname  =mysqli_real_escape_string($db,$_POST['djname']); 

    if (empty($Adderess)) {
        array_push($errors,"Adderess Is Required");
    }
    if (empty($phone)) {
        array_push($errors,"Phone Is Required");
    }
    if (empty($Description)) {
        array_push($errors,"Description About You Is Required");
    }

    if (count($errors) == 0) {
        $change = mysqli_query($db,"UPDATE `agency` SET `Phone`='$phone',`Agency_Name`='$djname',`Adderess`='$Adderess',`About_Me`='$Description' WHERE `Username`='$uname'");
        if ($change) {
            header('Location:Home');
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
    <!-- <title>Dashboard | Agency</title> -->
    <title>NxGala | Agency</title>
    <link rel="shortcut icon" href="../Images/favicon.png" type="image/x-icon">
    <style>
        .create{
        width: 90%;
         margin: auto;
            padding-top: 25px;
        }
        .create h1{
            font-size: 40px;
            text-align: center;
            border-bottom: 1px solid black;
        }
        .Select{
            width: 100%;
            padding: 8px 15px;
        }

        .contactForm {
            width: 90%;
            padding: 40px;
            margin: auto;
            background: #fff;
        }
        .contactForm h2{
            font-size: 30px;
            color: #333;
            font-weight: 500;
        }
        .contactForm .inputBox{
            margin-top: 10px;
            position: relative;
            width: 100%;
        }
        .contactForm .inputBox input,
        .contactForm .inputBox textarea{
            width: 100%;
            padding: 5px 0;
            font-size: 20px;
            resize: none;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #333;
            outline: none;
        }
        .contactForm .inputBox span{
            position: absolute;
            left: 0;
            padding: 5px 0;
            pointer-events: none;
            transition: 0.5s;
            color: #666;
            margin: 10px 0;
        }
        form .error-txt{
            
            color: #721c24;
            background: #f8d7da;
            padding: 8px 10px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #f5c6cb;
        }
        .contactForm .inputBox input:focus ~ span,
        .contactForm .inputBox input:valid ~ span,
        .contactForm .inputBox textarea:focus ~ span,
        .contactForm .inputBox textarea:valid ~ span{
            color: #e91e63;
            font-size: 17px;
            transform: translateY(-20px);
        }
        button{
            width: 30%;
            padding: 5px;
            font-size: 30px;
            background: #19ec12;
            cursor: pointer;
        }
        @media(max-width:778px){
            .contactForm{
                margin-top: 18%;
            }
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>    
    <?php include_once '../includes/Agency_Header.php' ?>
      <div class="contactForm">
        <h2>Edit Personal Information</h2>
        <?php if (count($errors) > 0) { ?>

        <div class="error" style="width:100%;height:auto;position:relative;text-align:left; font-size:18px;border:1px solid red;background:#f75757;">
        <?php foreach ($errors as $error) : ?>
		<p><?php echo $error; ?></p>
	<?php endforeach ?>

        </div>
        <?php } ?>
        <form action="edit" method="POST">

            <div class="inputBox">
                <input type="phone" name="phone"  value="<?php echo $res[7] ?>">
                <span>Phone</span>
            </div>
            <div class="inputBox">
                <input type="phone" name="djname"  value="<?php echo $res[5] ?>">
                <span>Dj Name</span>
            </div>
            <div class="inputBox">
                <textarea name="Adderess"  cols="30" rows="3" name="Adderess"  placeholder="<?php echo $res[8] ?>" value="<?php echo $Adderess; ?>"></textarea>
                <span>Adderess </span>
            </div>
            
            <div class="inputBox">
                <textarea name="Description"  cols="30" rows="5" name="Description"  placeholder="<?php echo $res[9] ?>" value="<?php echo $Description; ?>"></textarea>
                <span>Description </span>
            </div>
            <div class="inputBox">
            <button type="submit" name="Edit"> Edit </button>
            </div>
        </form>
    </div>

      <script src="javascript/index.js"></script>
</body>
</html>