<?php

//calling database
include("../database/connect_db.php");
if (isset($_GET['user_id'])) {
    $del_id = $_GET['user_id'];

    //deleting from database
    $delete = mysqli_query($link, "delete from students where id = $del_id");
    if (mysqli_affected_rows($link) == 1) {
        echo "sucessful";
        header("location:users");
    }
}
?>