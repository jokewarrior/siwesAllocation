<?php

//calling database
include("../database/connect_db.php");
if (isset($_GET['est_id'])) {
    $del_id = $_GET['est_id'];

    //deleting from database
    $delete = mysqli_query($link, "delete from establishment where id = $del_id");
    if (mysqli_affected_rows($link) == 1) {
        echo "sucessful";
        header("location:establishments");
    }
}
?>