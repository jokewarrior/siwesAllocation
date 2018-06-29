<?php

require_once './connect_db.php';
if (isset($db_select)) {
    $Users = "CREATE TABLE students (
	id INT( 8 ) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Firstname VARCHAR( 45 ) NOT NULL ,
        Lastname VARCHAR( 45 ) NOT NULL ,
        Othername VARCHAR( 45 ) NOT NULL ,
	Email VARCHAR( 45 ) NOT NULL ,
        Gender VARCHAR( 45 ) NOT NULL ,
        RegNumber VARCHAR( 45 ) NOT NULL ,
	Phone VARCHAR( 45 ) NOT NULL ,
        Location VARCHAR( 45 ) NOT NULL ,
        SupervisorId INT( 4 ) NOT NULL ,
        EstablishmentId INT( 4 ) NOT NULL ,
		Password VARCHAR( 50 ) NOT NULL
		)ENGINE = INNODB;";
    $run_users = mysqli_query($link, $Users);
    if (!$run_users) {
        echo 'users table not created <br>';
    } else {
        echo 'users table created successfully <br>';
    }

    $admin = "CREATE TABLE admin (
	id INT( 6 ) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR( 100 ) NOT NULL ,
        Email VARCHAR( 45 ) NOT NULL ,
	Password VARCHAR( 50 ) NOT NULL
	)ENGINE = INNODB;";
    $run_admin = mysqli_query($link, $admin);
    if (!$run_admin) {
        echo 'admin table not created <br>';
    } else {
        echo 'admin table created successfully <br>';
    }

    $supervisor = "CREATE TABLE supervisor (
        id INT( 6 ) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        Name VARCHAR( 100 ) NOT NULL ,
        Email VARCHAR( 100 ) NOT NULL ,
        Phone VARCHAR( 45 ) NOT NULL ,
        Location VARCHAR( 45 ) NOT NULL ,
        Password VARCHAR( 50 ) NOT NULL
        )ENGINE = INNODB;";
    $run_super = mysqli_query($link, $supervisor);
    if (!$run_super) {
        echo 'supervisor table not created <br>';
    } else {
        echo 'supervisor table created successfully <br>';
    }

    $establishment = "CREATE TABLE establishment (
		id INT( 6 ) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		Name VARCHAR( 100 ) NOT NULL ,
		Location VARCHAR( 100 ) NOT NULL ,
		Address VARCHAR( 100 ) NOT NULL
		)ENGINE = INNODB;";
    $run_transac = mysqli_query($link, $establishment);
    if (!$run_transac) {
        echo 'Establishment table not created <br>';
    } else {
        echo 'Establishment table created successfully <br>';
    }
    
    $message = "CREATE TABLE message (
		id INT( 6 ) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		Subject VARCHAR( 30 ) NOT NULL ,
		Message TEXT( 1000 ) NOT NULL ,
		SenderId INT( 8 ) NOT NULL
		)ENGINE = INNODB;";
    $run_message = mysqli_query($link, $message);
    if (!$run_message) {
        echo 'Message table not created';
    } else {
        echo 'Message table created successfully';
    }
} else {
    echo 'database not selected';
}
?>