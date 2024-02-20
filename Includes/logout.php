<?php
if (isset($_GET['lg'])) { 
	unset($_SESSION['Username']);
	unset($_SESSION['Username_Agency']);
	unset($_SESSION['Username_Admin']);
	session_destroy();
	setcookie("uname","",time()-2592000);
	setcookie("uname_agency","",time()-2592000);
	header('location:login');
 } 
?>
