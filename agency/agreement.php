<?php 
session_start();
require_once '../Includes/config.php';
require_once '../Includes/Agency_Auth.php';


$agree = "";
if(isset($_POST['submit'])){
    $agree = mysqli_real_escape_string($db,$_POST['agree']);

    $update = mysqli_query($db,"UPDATE `agency` SET `Agreement`='$agree' WHERE Username='$uname'");

    if($update){
        setcookie('uname_agency',$_SESSION['Username_Agency'],time()+2592000);
		// header('location:Agency/Home');
        header('location:edit');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NxGala | Agency</title>
    <link rel="shortcut icon" href="../Images/favicon.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="Style/agreement.css"> -->
    <style>
        *{
         margin: 0;
         padding: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .page{
            padding: 25px 5%;
            width: 80%;
            height: 80%;
            overflow-y: scroll;
            border: 1px solid #fff;
            margin: 5%;
            margin-left: 10%;
            box-shadow: 0.5rem -0.5rem 0.9rem rgb(243, 171, 89);
        }
        hr{
            border: .5px solid rgb(243, 171, 89);
            margin: 2% 0;
        }
        .page .title h1{
            text-align: center;
            /* font-size: 35px; */
            padding: 10px;
            font-weight: 500;
        }
        .page .use .title h1{
            text-align: center;
            font-weight: 200;
        }
        .page .use .question h2{
            margin-top: 3%;
            font-weight: 300;
        }
        .page .use .question .sollutions{
            display: flex;
            height: 100%;
            width: 100%;
            /* background: chartreuse; */
            justify-content: space-between;
            padding: 25px 10%;
        }
        .page .use .question .sollutions .images{
            height: 80%;
            width: 25%;
            display: block;
        }
        .page .use .question .sollutions .images img{
            height: 100%;
            width: 100%;
        }
        @media(max-width:778px){
            html{
                font-size: 90%;
            }
            .page .use .question {
                width: 100%;
            }
            .page .use .question .sollutions{
                display: flex;
                flex-direction: column;
                margin-top: 15px;
                height: 100%;
                width: 100%;
                /* background: chartreuse; */
                justify-content: center;
                /* padding: 25px 10%; */
            }
            
            .page .use .question .sollutions .images{
                height: 80%;
                width: 100%;
                margin-top: 15px;
                display: block;
            }
            .page .use .question .sollutions .text{
                /* height: 80%;
                width: 100%; */
                margin-top: 8px;
                /* display: block; */
            }
        }
    </style>
</head>
<body>
    
    <div class="page">
        <div class="title"><h1><h1>How To Use Website</h1> </h1></div>
        <hr>
        <div class="use">
            <div class="title">
                <!-- <h1>How To Use Website</h1> -->
            </div>
            <div class="question">
                <h2>1.How To Add Post</h2>
                <div class="sollutions">
                    <div class="images">
                        <img src="Agree_Images/Agency/post.jpg" alt="">
                        <div class="text">
                            1.Click On This Icon
                        </div>
                    </div>
                    <div class="images">
                        <img src="Agree_Images/Agency/post-form.jpg" alt="">
                        <div class="text">
                            1.Rename Image(Username_) <br><br>
                            2.Select Only jpg,jpeg and Gif <br><br>
                            3.Write Some Text About Image And Click On Add Image
                        </div>
                    </div>
                    <div class="images">
                        <img src="Agree_Images/Agency/post_image.jpeg" alt="">
                        <div class="text">
                            1.Your Post is Ready To Show Users <br><br>
                            2.If You Want To Remove From Your Image Gallery Then Click On Trash Button
                        </div>
                    </div>  
                </div>
                
            </div>

            <div class="question">
                <h2>2.How To Work With Event</h2>
                <div class="sollutions">
                    <div class="images">
                        <img src="Agree_Images/Agency/Event_1.jpg" alt="">
                        <div class="text">
                            1.Click On Create Event <br><br>
                            2.Please Remember That Before Add Event You Need To Give Your Personal Information Like Adderess,Agency Name And Something About. <br><br>
                            3.Add Event Details Like Price and etc.
                        </div>
                    </div>
                    <div class="images">
                        <img src="Agree_Images/Agency/Event_2.jpg" alt="">
                        <div class="text">
                            1.Edit Event Price And Description Go to Event And Click On Edit button <br><br>
                            2.Then Update The Price And Descriotion , Click On Update <br><br>
                        </div>
                    </div>
                    <div class="images">
                        <img src="Agree_Images/Agency/Event_3.jpg" alt="">
                        <div class="text">
                            1. If You Want To Delete Event Then Simply Click On Delete Button <br><br>
                            <!-- 2.If You Want To Remove From Your Image Gallery Then Click On Trash Button -->
                        </div>
                    </div>  
                </div>
                
            </div>

            <div class="question">
                <h2>3.How To Work With Order</h2>
                <div class="sollutions">
                    <div class="images">
                        <img src="Agree_Images/Agency/Order_1.jpg" alt="">
                        <div class="text">
                            1.You Will Get The Details Of User With Adderess And Date Of Event You have To Take An Action By Seeing Your Schedule <br><br>
                            <!-- 2.If You Are Comfortable On Date Of Event At Adderess User Select Then Click On Accept. -->
                        </div>
                    </div>
                    <div class="images">
                        <img src="Agree_Images/Agency/Order_2.jpg" alt="">
                        <div class="text">
                            1.If You Are Comfortable On Date Of Event At Adderess User Select Then Click On Accept. <br><br>
                            2.If You Are Not Comfortable To Give Service On Time and Adderess Where User Select Then Please Reject The Order.
                        </div>
                    </div>
                    <div class="images">
                        <img src="Agree_Images/Agency/Order_3.jpg" alt="">
                        <div class="text">
                            1. When You Accept The Order Request Then You Will See Send Data You Have To Click On Send Me <br><br>
                            2.Then Cheak Your Email For User Phone Number And Email Id <br> (* Because Of User Privacy)
                        </div>
                    </div>  
                </div>
                
            </div>

            <div class="question">
                <h2>4. Change Your Details Or Password</h2>
                <div class="sollutions">
                    <div class="images">
                        <img src="Agree_Images/Agency/Change_1.jpg" alt="">
                        <div class="text">
                            1.If You Want To Change Password Then Click On Reset Password <br><br>
                            <!-- 2.If You Are Comfortable On Date Of Event At Adderess User Select Then Click On Accept. -->
                        </div>
                    </div>
                    <div class="images">
                        <img src="Agree_Images/Agency/Change_2.jpg" alt="">
                        <div class="text">
                            1.If You Want To Change Personal Details Then Click On Edit. <br><br>
                            <!-- 2.If You Are Not Comfortable To Give Service On Time and Adderess Where User Select Then Please Reject The Order. -->
                        </div>
                    </div>
                    <div class="images">
                        <img src="Agree_Images/Agency/Change_3.jpg" alt="">
                        <div class="text">
                            1. Then Rewrite All The Details And Click On Edit<br><br>
                            <!-- 2.Then Cheak Your Email For User Phone Number And Email Id <br> (* Because Of User Privacy) -->
                        </div>
                    </div>  
                </div>
                
            </div>
            
        </div>
        <hr>
        <div class="rules">
            <h1 style="font-weight: 200; margin-bottom: 30px;">Rules And Policy</h1>
            <ul>
                <li>You Have To Cheak Your Dashboard Every Day For Updates Of Order.</li><br><br>
                <li>You Can Show Your Event in Free Of Cost No One Will Take Renewable Charge From You.</li> <br><br>
                <li>But, When You Get The Order From Our Website Then You Have To Pay Us <br><br>
                    <ul>
                        <li>If You Get Order And The Price Of That Event Is More Than &#8377;10000 Then You Have To Pay 10% Of Event Price.</li><br>
                        <li>Or If Event Price Is More Than &#8377;10000 Than You Have To Pay &#8377;1200 Fix</li><br>
                        <li>(* In Both Case If User Will Not Pay You Money Then Please Contact Our Team , The company will help you to make payments from users)</li><br>
                        <li style="list-style: none;"><a href="tel: +91 7043165793" style="text-decoration: none; color: #ffffff; padding: 5px 8px; background: rgb(76, 83, 75);">Call Now</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <hr>
        <ul>
            <li style="list-style: none;">
                (* If You Agree With All Rules And Policy Then Click On Cheak Button And Then Click On Submit) <br>
                <form action="agreement" method="POST">
                    <br>
                    <input type="checkbox" name="agree" value="Agree" >(Here Is The Cheak Box) <br>
                    <br>
                    <input type="submit"  name="submit" style="padding:5px 8px" value="Yes I am Agree">
                </form>
            </li>
        </ul>
    </div>



</body>
</html>