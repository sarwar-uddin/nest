<?php
session_start();

require_once ('../config/connection.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['house_id'])) {
    $houseID = $_GET['house_id'];

    $propertyQuery = "SELECT H.*, HI.filename
                     FROM Houses H
                     LEFT JOIN HouseImages HI ON H.house_id = HI.house_id
                     WHERE H.house_id = ?";

    $stmt = $conn->prepare($propertyQuery);
    $stmt->bind_param("i", $houseID);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $propertyDetails = $result->fetch_assoc();
    } else {
        echo "Property not found.";
        exit();
    }

    $stmt->close();
} else {
    echo "House ID not provided.";
    exit();
}
?>