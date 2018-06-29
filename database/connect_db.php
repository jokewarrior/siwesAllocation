<?php

define("DB_NAME", "michelle");
define("DB_HOSTNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");


//###hostname for checking mobile compactibility
//define("HOSTNAME", "http://192.168.43.196/my_project/");

define("HOSTNAME", "http://localhost/my_project/");
//database connection
$link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);

if (!$link) {
    die("could not connect to database: " . mysqli_error($link));
} else {
    $db_select = mysqli_select_db($link, DB_NAME);
    if (!$db_select) {
        die("could not connect to database: " . mysqli_error($link));
    }
}
?>