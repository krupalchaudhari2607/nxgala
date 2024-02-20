<?php
require_once '../includes/Agency_Auth.php';
require_once '../Includes/config.php';
$id = $_GET['Del'];
$d_query = mysqli_query($db,"SELECT * FROM posts WHERE ID=".$id."");
$res = mysqli_fetch_array($d_query);
$image = $res['Image'];
$query="DELETE FROM `posts` WHERE ID=".$id."";
$result = mysqli_query($db,$query);
if ($result) {
    unlink("Posts/".$image);
    header('location:home');
}

?>