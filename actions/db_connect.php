<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "CR10_MichaelR_BigLibrary" ;
            
$connect = new mysqli($hostname, $username, $password, $dbname);
            
// check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
    }/* else {
    echo "Connected successfully";
    } */
?>