<?php
// start the session
session_start();

// check if the user is logged in as admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Connect to Database
require_once ('../config/connection.php');

// user role update form
if (isset($_POST['user_id'], $_POST['user_role'])) {
    $userId = $_POST['user_id'];
    $userRole = $_POST['user_role'];

    // update the user role in the database
    $query = "UPDATE users SET user_role='$userRole' WHERE user_id='$userId'";
    mysqli_query($conn, $query);
}

// Initialize search variables
$searchQuery = '';
$users = [];

// Handle user search
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
    // Perform a user search by username
    $query = "SELECT * FROM users WHERE username LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Fetch all user info from the database if no search query
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>