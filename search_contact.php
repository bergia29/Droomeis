<?php
include 'database_connection.php';

$name = isset($_GET['name']) ? trim($_GET['name']) : '';

if (empty($name)) {
    echo json_encode([]);
    exit;
}


$sql = "SELECT ID, Name, Status, '' as LastMessage FROM users WHERE Name LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$name%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $contact = $result->fetch_assoc();
    echo json_encode($contact);
} else {
   
    echo json_encode([]);
}
?>