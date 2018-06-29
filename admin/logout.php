<?php
unset($_SESSION['admin_id']);
//calling session
//if (session_status() !== PHP_SESSION_ACTIVE) {
//    session_start();
//}
header('location:./login.php');
die();
?>