<?php 
session_start();    
if (!isset($_SESSION['Username_admin'])) {
    header('Location:../index');
}

?>