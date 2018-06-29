<?php

//start session
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:../login.php");
}
require_once '../database/connect_db.php';
require_once '../functions/functions.php';
$user = getuserdata();
$user_id = $user['id'];
$userFname = $user['Firstname'];
$userLname = $user['Lastname'];
$userOname = $user['Othername'];
$userPhone = $user['Phone'];
$userReg = $user['RegNumber'];
$userGender = $user['Gender'];
$userEmail = $user['Email'];
$supId = $user['SupervisorId'];
$userLocation = $user['Location'];


if (isset($user_id)) {
    $kwary = "SELECT * FROM supervisor ORDER BY RAND() LIMIT 1";
    $runKwary = mysqli_query($link, $kwary);
    if (mysqli_num_rows($runKwary) == 1) {
        $row = mysqli_fetch_assoc($runKwary);
        $supv = $row['id'];

        $inskwery = "UPDATE students SET SupervisorId = '$supv' WHERE id ='$user_id'";
        $kwery = mysqli_query($link, $inskwery);
        if ($kwery) {
            header("location:supAlloc");
        } else {
            
        }
    }
}
?>