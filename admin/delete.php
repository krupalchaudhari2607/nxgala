<?php
 require_once '../includes/Admin_Auth.php'; 

 require_once '../Includes/config.php';
$id = $_GET['Del'];

$query="DELETE FROM `city` WHERE ID=".$id."";
mysqli_query($db,$query);
header('location:city');

?>