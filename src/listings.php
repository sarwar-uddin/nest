<?php
// Start the session
session_start();

// Include the database connection
require_once ('../config/connection.php');

// Query to fetch house details with owner information for available houses
$query = "SELECT Houses.house_id, title, description, rent, address, city, bedrooms, bathrooms, square_feet, date_of_availability, 
                 users.username AS owner_username, users.email AS owner_email
          FROM Houses
          INNER JOIN users ON Houses.user_id = users.user_id
          WHERE availability_status = 'Available'";

$result = mysqli_query($conn, $query);
?>
