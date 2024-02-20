<!DOCTYPE html>
<?php require_once '../includes/Admin_Auth.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/Create_Slideshow.css">
    <link rel="stylesheet" href="Style/pop_up.css">
    <title>User Review | Dashboard</title>
</head>
<body>
    <section class="one" style="background-image:url('Image/images.png');" >
        <h2 data-text="Contact Us">User Review</h2>
    </section>
    
    <table>
        <thead>
            <th>Index.No</th>
            <th>Name</th>
            <th>Agency Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </thead>
        <tbody>
            <tr>
                <td data-label="S.No">1</td>

                <td data-label="Image">Krupal Chaudhari</td>
                
                <td data-label="Date">Wedding</td>
                <td data-label="">Wedding</td>
                <td data-label="">Krupal</td>
                <td data-label="Message">
                            
                            <div class="popup" id="popup-1">
                                <div class="overlay"></div>
                                <div class="content">
                                <div class="close-btn" onclick="togglePopup()">×</div>
                                <h1>Title</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aspernatur laborum rem sed laudantium excepturi veritatis voluptatum architecto, dolore quaerat totam officiis nisi animi accusantium alias inventore nulla atque debitis.</p>
                                </div>
                            </div>
                            <button onclick="togglePopup()">Read More</button>
                </td>
                                
            </tr>
         </tbody>
    </table>

    <script>
    function togglePopup(){
      document.getElementById("popup-1").classList.toggle("active");
    }
</script>
</body>
</html>