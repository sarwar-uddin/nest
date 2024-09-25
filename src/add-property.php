<?php
session_start();
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Database connection
        require_once ('../config/connection.php');
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $rent = $_POST['rent'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $bedrooms = $_POST['bedrooms'];
        $bathrooms = $_POST['bathrooms'];
        $square_feet = $_POST['square_feet'];
        $date_of_availability = $_POST['date_of_availability']; 
        $user_id = $_SESSION['user_id']; // Retrieve user_id from the session

        // Insert property details into the Houses table
        $insertPropertySQL = "INSERT INTO Houses (title, description, rent, address, city, bedrooms, bathrooms, square_feet, date_of_availability, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertPropertySQL);
        $stmt->bind_param("ssdssiiiss", $title, $description, $rent, $address, $city, $bedrooms, $bathrooms, $square_feet, $date_of_availability, $user_id);
     
        if ($stmt->execute()) {
            $propertyID = $stmt->insert_id;

            // Insert image URLs into the HouseImages table
            for ($i = 1; $i <= 3; $i++) {
                $imageURL = $_POST['image' . $i];
                if (!empty($imageURL)) {
                    $insertImageSQL = "INSERT INTO HouseImages (house_id, filename) VALUES (?, ?)";
                    $stmt = $conn->prepare($insertImageSQL);
                    $stmt->bind_param("is", $propertyID, $imageURL);
                    $stmt->execute();
                }
            }
            // Redirect to property listing page
            header('Location: listings.php');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
 
?>