<?php
require_once '../includes/Agency_Auth.php';
require_once '../Includes/config.php';
$id = $_GET['Del'];
$d_query = mysqli_query($db,"SELECT * FROM events WHERE ID=".$id."");
$res = mysqli_fetch_array($d_query);
$image = $res['Image'];
$query="DELETE FROM `events` WHERE ID=".$id."";
$result = mysqli_query($db,$query);
if ($result) {
    unlink("Images/".$image);
    header('location:Event');
}

?>