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

// Initialize a variable to track message status
$messageStatus = "";

// Handle the message form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['receiver_username']) && isset($_POST['subject']) && isset($_POST['message_text'])) {
        $sender_username = $_SESSION['username']; // Use the sender's username
        $receiver_username = $_POST['receiver_username'];
        $subject = $_POST['subject'];
        $message_text = $_POST['message_text'];

        // Check if the receiver username exists in the users table
        $query = "SELECT username FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $receiver_username);
        $stmt->execute();
        $stmt->store_result();
        $receiver_exists = $stmt->num_rows > 0;
        $stmt->close();

        if ($receiver_exists) {
            // Insert the message into the Messages table
            $query = "INSERT INTO Messages (sender, receiver, subject, message_text) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $sender_username, $receiver_username, $subject, $message_text);

            if ($stmt->execute()) {
                // Message sent successfully
                $messageStatus = '<div class="alert alert-success" role="alert">Message sent!</div>';
            } else {
                $messageStatus = '<div class="alert alert-danger" role="alert">Error sending message.</div>';
            }

            $stmt->close();
        } else {
            $messageStatus = '<div class="alert alert-danger" role="alert">Receiver username not found.</div>';
        }
    }
}
?>