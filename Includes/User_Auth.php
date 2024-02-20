<?php    
error_reporting(0);
if (!isset($_SESSION['Username']) && $_COOKIE['uname'] == "") {
    header('Location:index');
}
else if($_COOKIE['uname'] != "" )
{
    $_SESSION['Username']=$_COOKIE['uname'];
    $uname = $_SESSION['Username'];
}

?>