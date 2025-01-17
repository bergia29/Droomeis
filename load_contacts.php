<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "messagerie_system";


$conn = new mysqli($host, $username, $password, $dbname);

// connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$contacts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $contacts[] = $row;
    }
}


header('Content-Type: application/json');
echo json_encode($contacts);

$conn->close();
?>