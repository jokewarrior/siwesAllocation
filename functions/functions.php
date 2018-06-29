<?php

//getting userr by id
function getuserdata($field = '') {
    global $link;
    $field = (empty($field)) ? '*' : mysqli_real_escape_string($field);
    $query = mysqli_query($link, "SELECT {$field} FROM students WHERE id ='" . $_SESSION['user_id'] . "' LIMIT 1");
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
}
function getsupdata($field = '') {
    global $link;
    $field = (empty($field)) ? '*' : mysqli_real_escape_string($field);
    $query = mysqli_query($link, "SELECT {$field} FROM supervisor WHERE id ='" . $_SESSION['sup_id'] . "' LIMIT 1");
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
}

