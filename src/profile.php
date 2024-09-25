<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

require_once ('../config/connection.php');

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "Error: Unable to fetch user profile.";
    }

    mysqli_close($conn);
    
    if (!$user) {
        echo "User not found.";
        exit();
    }
} else {
    echo "Username not provided in the URL.";
    exit();
}

?>