<?php
session_start();

require_once '../Includes/config.php';
if ($db) {
       $pie=mysqli_query($db,"SELECT count(Type),Type from events group by Type");  
       $Turnover_Count= mysqli_query($db,"SELECT SUM(Price) FROM agency_order ");
       $pie_order_status = mysqli_query($db,"SELECT count(Status),Status from agency_order group by `Status`");
       $pie_order_type = mysqli_query($db,"SELECT count(Event_Type),`Event_Type` from agency_order group by `Event_Type`");
       $user_Count=mysqli_query($db,"SELECT count(*) from user");
       $Agency_Count=mysqli_query($db,"SELECT count(*) from Agency");
       $Order_Count=mysqli_query($db,"SELECT count(*) from agency_order;");
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NxGala | Admin</title>
    <link rel="shortcut icon" href="../Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'count(Type)'],
         <?php
            while ($res =mysqli_fetch_assoc($pie)) {
                echo "['".$res['Type']."',".$res['count(Type)']."],";
            }
         ?>
        ]);

        var options = {
          title: 'Events'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'count(Type)'],
         <?php
            while ($res_status =mysqli_fetch_assoc($pie_order_status)) {
                echo "['".$res_status['Status']."',".$res_status['count(Status)']."],";
            }
         ?>
        ]);

        var options = {
          title: 'Order Status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_1'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'count(Type)'],
         <?php
            while ($res_type =mysqli_fetch_assoc($pie_order_type)) {
                echo "['".$res_type['Event_Type']."',".$res_type['count(Event_Type)']."],";
            }

         ?>
        ]);

        var options = {
          title: 'Order Status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_2'));

        chart.draw(data, options);
      }
    </script>
    
    <link rel="stylesheet" href="Style/Admin.css">
</head>
<body onload="initClock();" >


     <header>
     <a href="home" class="logo"><span><img src="../Images/favicon.png" style="height: 25px;width: 25px;display: inline;line-height: 25px;"></span>NxGala</a>
        <span class="hello">Hello,<?php echo base64_decode($_SESSION['Username_admin']); ?></span>

        <nav class="nav-Bar">
        <ul id="MenuItems">
            <li><a href="Home">Home</a></li>
            
            
            <li><a href="change_password">Change Password</a></li>
            
            <li><a href="../index?logout='1' ">Logout</a></li>
        </ul>
        </nav>
        <div class="bar" onclick="menutoggle()">
            <i class="fa fa-bars"></i>
        </div>
    </header>
    
    <div class="container">
        <div class="plot-1">
            <div class="datetime">
                <div class="date">
                  <span id="dayname">Day</span>,
                  <span id="month">Month</span>
                  <span id="daynum">00</span>,
                  <span id="year">Year</span>
                </div>
                <div class="time">
                  <span id="hour">00</span>:
                  <span id="minutes">00</span>:
                  <span id="seconds">00</span>
                  <span id="period">AM</span>
                </div>
            </div>
           
        </div>
        <div class="plot-2">
        <div id="piechart" style="width: 100%; margin: auto; height:100%;"></div>
          </div>
    </div>
<?php 
    $User_result = mysqli_fetch_assoc($user_Count);
    $Agency_result = mysqli_fetch_assoc($Agency_Count);
    $Order_result = mysqli_fetch_assoc($Order_Count);
    $Turnover_result = mysqli_fetch_assoc($Turnover_Count);
    
?>
    <div class="space" style="height: 10vh;"></div>
    <div class="scards">
        <div class="scard" style="background: radial-gradient(#fff,rgb(91, 9, 243));" >
        <i class="fa fa-users"></i>
        <span class="title">Users</span>
        <div class="number"><h2><?php echo $User_result['count(*)']; ?></h2></div>
        </div>
        <div class="scard" style="background: radial-gradient(#fff,rgb(238, 94, 238));">
        <i class="fa fa-cog"></i>
        <span class="title">Agency</span>
        <div class="number"><h2><?php echo $Agency_result['count(*)']; ?></h2></div>
        </div>
        <div class="scard" style="background: radial-gradient(#fff,rgb(203, 55, 240));">
        
        <i class="fa fa-calendar-check-o"></i>
        <span class="title">Order</span>
        <div class="number"><h2><?php echo $Order_result['count(*)']; ?></h2></div>
        </div>
        <div class="scard" style="background: radial-gradient(#fff,rgb(55, 240, 86));">
        <i class="fa fa-inr"></i>
        <span class="title">Turnover</span>
        <div class="number"><h2><?php echo $Turnover_result['SUM(Price)']; ?></h2></div>
        </div>
    </div>
    <div class="space" style="height: 10vh;"></div>


    <div class="container">
        <div class="plot-1" style="background: #fff;">
        <div id="piechart_1" style="width: 100%; margin: auto; height:100%;"></div>
        </div>
        <div class="plot-2">
        <div id="piechart_2" style="width: 100%; margin: auto; height:100%;"></div>
        </div>
    </div>
    
    <section class="content">
        <h1>Admin Page Control</h1>
        <div class="border"></div>
            <div class="row">

                <a href="events">
                <div class="card">
                    <div class="image">
                        <img src="Image/different-squares.png" alt="">
                    </div>
                    <div class="title"><h1>Event Category</h1></div>
                </div>
               </a>

               <a href="List_of_Client">
                <div class="card">
                    <div class="image">
                        <img src="Image/customer.png" alt="">
                    </div>
                    <div class="title"><h1>List Of Agency</h1></div>
                </div>
               </a>

               <a href="Order">
                <div class="card">
                    <div class="image">
                        <img src="Image/checklist.png" alt="">
                    </div>
                    <div class="title">
                        <h1>List Of Order</h1>
                    </div>
                </div>
               </a>
               <a href="Contact_us">
                <div class="card">
                    <div class="image">
                        <img src="Image/email.png" alt="">
                    </div>
                    <div class="title">
                        <h1>Contact US</h1>
                    </div>
                </div>
               </a>
               
            </div>
    </section>

    <section class="content">
        <h1>Personal Information</h1>
        <div class="border"></div>
            <div class="row">
                <a href="List_of_user">
                <div class="card">
                    <div class="image">
                        <img src="Image/customer.png" alt="">
                    </div>
                    <div class="title"><h1>List Of User</h1></div>
                </div>
               
                </a>
                <a href="List_of_events">
                <div class="card">
                    <div class="image">
                        <img src="Image/checklist.png" alt="">
                    </div>
                    <div class="title"><h1>List Of Events</h1></div>
                </div>
               </a>

               <a href="Team_member">
                <div class="card">
                    <div class="image">
                        <img src="Image/different-squares.png" alt="">
                    </div>
                    <div class="title">
                        <h1>Team Member</h1>
                    </div>
                </div>
               </a>
               <a href="city">
                    <div class="card">
                    <div class="image">
                        
                        <img src="Image/location.png" alt="">
                    </div>
                    <div class="title">
                        <h1>City</h1>
                    </div>
                    </div>
               </a>

               
            </div>
    </section>
    <script src="java Script/stiky.js"></script>
    <script src="java Script/clock.js"></script>
</body>
</html>