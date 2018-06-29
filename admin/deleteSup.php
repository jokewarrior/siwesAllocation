<?php

//calling database
include("../database/connect_db.php");
if (isset($_GET['sup_id'])) {
    $del_id = $_GET['sup_id'];

    //deleting from database
    $delete = mysqli_query($link, "delete from supervisor where id = $del_id");
    if (mysqli_affected_rows($link) == 1) {
        echo "sucessful";
        header("location:supervisor");
    }
}
?>
