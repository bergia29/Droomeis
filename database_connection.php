<?php

$host = "localhost";       
$username = "root";        
$password = "";            
$dbname = "messagerie_system"; 


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


$conn->set_charset("utf8");
?>