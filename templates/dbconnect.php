<?php

// MySQL server information
$servername = "localhost"; 
$username = "ims_admin"; 
$password = "123#ims"; 
$dbname = "ims"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>