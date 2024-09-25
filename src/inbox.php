<?php
// Start the session
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
require_once ('../config/connection.php');
// Function to get received messages for the current user
function getReceivedMessagesForUser($conn, $user_id) {
    $query = "SELECT * FROM Messages WHERE receiver = ? ORDER BY timestamp DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

// Function to get sent messages for the current user
function getSentMessagesForUser($conn, $user_id) {
    $query = "SELECT * FROM Messages WHERE sender = ? ORDER BY timestamp DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

// Retrieve received and sent messages for the current user
$user_id = $_SESSION['username'];
$receivedMessages = getReceivedMessagesForUser($conn, $user_id);
$sentMessages = getSentMessagesForUser($conn, $user_id);
?>
