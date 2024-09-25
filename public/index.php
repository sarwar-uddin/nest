<?php
// start the session
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../src/index.php');

// database connection
require_once ('../config/connection.php');

// Close the database connection
//mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Home | NEST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php require_once('../src/inc/navbar.php'); ?>
<div class="container" style="margin-top: 10px;">


    <div class="card text-bg-dark">
  <img src="assets/images/dhaka.jpg" class="card-img" alt="Background Image">
  <div class="card-img-overlay">
    <h2 class="card-title" style="font-family: Tahoma; text-shadow: 6px 6px 12px rgba(0, 0, 0, 0.95); margin-top:20px;">WELCOME TO NEST</h5>
    <p class="card-text" style="font-size: 20px; font-family: Tahoma, 'Times New Roman'; color: #FFFFFF; text-shadow: 6px 6px 12px rgba(0, 0, 0, 0.95); margin-top: 20px;">
      Your one-stop destination for finding the perfect rental home!<br> 
      Whether you're searching for a cozy apartment, a spacious house, or a charming cottage, we've got you covered.<br> 
      Explore our extensive listings, and let us help you find the ideal place to call home.<br>
      Start your journey towards your dream rental today!<br>
    </p>
  </div>
</div>

      <h1 class="mt-5" style="text-align: center;">Recently Added</h1>
      <hr>
      <?php
        if (mysqli_num_rows($result) > 0) {
            // Start the first row
        
            echo '<div class="row">';
            if (mysqli_num_rows($result) > 0) {
                while ($house = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-6">'; // col-md-4 for three listings per row, col-md-6 for two listings per row
            
                    // fetch the image for this house
                    $imageQuery = "SELECT filename FROM HouseImages WHERE house_id = {$house['house_id']} LIMIT 1";
                    $imageResult = mysqli_query($conn, $imageQuery);
        
                    if ($imageResult && $image = mysqli_fetch_assoc($imageResult)) {
                        echo '<div class="card mb-3" style="max-width: 648px;">';
                        echo '<div class="row g-0">';
                        echo '<div class="col-md-4" style="background-image: url(' . $image['filename'] . '); background-size: cover;">'; // Left column for the image
                        echo '<div class="image-overlay"></div>';
                        echo '</div>'; // Close (left column)
                        echo '<div class="col-md-8">'; // Right column
                        echo '<div class="card-body">';
                        // card content for the right column
                        echo "<h5 class='card-title'>{$house['title']}</h5>";
                        echo "<p class='card-text'><a href='profile.php?username={$house['owner_username']}' style='text-decoration: none;'>{$house['owner_username']}</a></p>";
                        echo "<p class='card-text'>৳ {$house['rent']}</p>";
                        echo "<p class='card-text'> &#x1F4C5; {$house['date_of_availability']}</p>";
                        echo "<p class='card-text'>{$house['address']}</p>";
                        echo "<a href='property-details.php?house_id={$house['house_id']}' class='btn btn-primary'>View Details</a>";
                        echo '</div>'; // Close the card-body for the right column
                        echo '</div>'; // Close (right column)
                        echo '</div>'; // Close the row for the image and content
                        echo '</div>'; // Close the card
                    }
                    echo '</div>'; // Close col-md-4 or col-md-6
                }
                // Close the last row
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">';
                echo "Sorry, there's no available house right now.";
                echo '</div>';
            }
        }
        mysqli_close($conn);

            ?>
    </div>

</body>
</html>
