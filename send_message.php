<?php
include 'database_connection.php';

$contactID = isset($_POST['contactID']) ? intval($_POST['contactID']) : null;
$message = isset($_POST['message']) ? trim($_POST['message']) : null;

if (!$contactID || !$message) {
    echo "il manque des données importantes！";
    exit;
}

$currentUserID = 1;
$timestamp = date('Y-m-d H:i:s');

$sql = "INSERT INTO messages (SenderID, ReceiverID, Text, Timestamp) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiss", $currentUserID, $contactID, $message, $timestamp);

if ($stmt->execute()) {
    echo "Message sent successfully.";
} else {
    echo "Error inserting message: " . $conn->error;
}