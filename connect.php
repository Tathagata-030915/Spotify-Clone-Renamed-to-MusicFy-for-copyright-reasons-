<?php

$host="localhost";
$user="root";
$pass="mypass";
$db="musicfy";
$conn= new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo "Failed to connect to Database".$conn->connect_error;
}


?>