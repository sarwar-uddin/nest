<?php
// Start the session
//session_start();

// Include the database connection
require_once ('../config/connection.php');

// Query to fetch the two most recently added available houses
$query = "SELECT Houses.house_id, title, description, rent, address, city, bedrooms, bathrooms, square_feet, date_of_availability, 
                 users.username AS owner_username, users.email AS owner_email
          FROM Houses
          INNER JOIN users ON Houses.user_id = users.user_id
          WHERE availability_status = 'Available'
          ORDER BY Houses.house_id DESC
          LIMIT 2";  // This limits the result to two most recent listings

$result = mysqli_query($conn, $query);

$result = mysqli_query($conn, $query);
?>
