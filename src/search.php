<?php
session_start();

require_once ('../config/connection.php');

$searchQuery = $_GET['query'];

$query = "SELECT Houses.house_id, title, description, rent, address, city, bedrooms, bathrooms, square_feet, date_of_availability, 
                 users.username AS owner_username, users.email AS owner_email
          FROM Houses
          INNER JOIN users ON Houses.user_id = users.user_id
          WHERE city LIKE '%$searchQuery%'";

$result = mysqli_query($conn, $query);
?>
