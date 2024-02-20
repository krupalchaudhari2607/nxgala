<?php 
error_reporting(0);
if (!isset($_SESSION['Username_Agency']) && $_COOKIE['uname_agency'] == "") {
    header('Location:../index');
}
else if($_COOKIE['uname_agency'] != "" )
{
    $_SESSION['Username_Agency']=$_COOKIE['uname_agency'];
    $uname = $_SESSION['Username_Agency'];
}


?>