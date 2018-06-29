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
$estId = $user['EstablishmentId'];
$userLocation = $user['Location'];

//$estStudentsLimit = 10;
$estStudentNo;

if (isset($user_id)) {
    /* main logic */
    $kwary = "SELECT * FROM establishment WHERE Location = '$userLocation' ORDER BY RAND() LIMIT 1";
    $runKwary = mysqli_query($link, $kwary);
    if (mysqli_num_rows($runKwary) == 1) {
        $row = mysqli_fetch_assoc($runKwary);
        $estplace = $row['id'];

        $inskwery = "UPDATE students SET EstablishmentId = '$estplace' WHERE id ='$user_id'";
        $kwery = mysqli_query($link, $inskwery);
        if ($kwery) {
            header("location:allocation");
        } else {
            
        }
    }
    /* $estplaces = array();
      while ($catch = mysqli_fetch_array($runKwary)) {
      $est = array();
      $est['id'] = $catch['id'];
      array_push($est, $estplaces);
      print_r($est);
      } */

    //$loc = mysqli_num_rows($runKwary);


    /*
      $felix = rand(1, $loc);
      //insert establishment id into student table
      $inskwery = "UPDATE students SET EstablishmentId = '$felix' WHERE id ='$user_id'";
      $kwery = mysqli_query($link, $inskwery);
      if ($kwery) {
      header("location:allocation");
      } else {

      } */
}
?>