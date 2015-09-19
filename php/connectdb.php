<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "root";
$dbname = "";
$dbport = 8889;

$init = mysqli_init();
$connection = mysqli_real_connect($init, $host, $user, $password, $dbname, $dbport);
if (!$connection) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>