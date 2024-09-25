<?php
// start the session
session_start();

// Connect to Database
require_once ('../config/connection.php');

// check if the user is logged in as admin or owner
if (isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'owner' || $_SESSION['user_role'] === 'admin')) {         

$user_id = $_SESSION['user_id']; 

if(isset($_POST['update_status'])){
    $house_id = $_POST['house_id'];
    $new_status = $_POST['status'];
    $query = "UPDATE Houses SET availability_status='$new_status' WHERE house_id='$house_id'";
    if(mysqli_query($conn, $query)){
        echo 'Status updated successfully';
    } else{
        echo "Error updating status: " . mysqli_error($conn);
    }
}

if(isset($_POST['delete_listing'])){
    $house_id = $_POST['house_id'];
    $query = "DELETE FROM Houses WHERE house_id='$house_id'";
    if(mysqli_query($conn, $query)){
        echo "Listing deleted successfully";
    } else{
        echo "Error deleting listing: " . mysqli_error($conn);
    }
}

$query = "SELECT * FROM Houses WHERE user_id='$user_id'";
$result = mysqli_query($conn, $query);
}
?>