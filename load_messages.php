<?php
include 'database_connection.php';

$contactID = $_GET['contactID'];


if (!$contactID) {
    echo json_encode([]);
    exit;
}

$sql = "SELECT SenderID, Text, Timestamp FROM messages WHERE SenderID = ? OR ReceiverID = ? ORDER BY Timestamp ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $contactID, $contactID);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}


header('Content-Type: application/json');
echo json_encode($messages);
?>