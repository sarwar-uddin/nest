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

// Retrieve the message details based on the message_id parameter
if (isset($_GET['message_id'])) {
    $message_id = $_GET['message_id'];
    
    $query = "SELECT * FROM Messages WHERE message_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $message = $result->fetch_assoc();
    $stmt->close();
    
    // Update the 'is_read' status to 1 for this message
    if ($_SESSION['username'] === $message['receiver']) {
    $query = "UPDATE Messages SET is_read = 1 WHERE message_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $stmt->close();
    }
}
?>