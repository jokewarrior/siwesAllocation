<?php
unset($_SESSION['sup_id']);
//calling session
//if (session_status() !== PHP_SESSION_ACTIVE) {
//    session_start();
//}
header('location:../index.php');
die();
?>