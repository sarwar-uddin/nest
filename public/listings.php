<?php require_once('../src/listings.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Available Houses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
      .small-image {
      max-width: 100px; /* Thumbnail width */
      height: auto;
      }
      tr.clickable {
            cursor: pointer;
      }
    </style>
  </head>
  <body>
    <?php require_once('../src/inc/navbar.php'); ?>
    <div class="container" style="margin-top: 0px;">
      <h1 class="mt-5" style="text-align: center;">Available Houses</h1>
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
            ?>
    </div>
    <script>
      function navigateToDetails(houseId) {
        // Navigate to the details page with the house_id parameter
        window.location.href = 'property-details.php?house_id=' + houseId;
      }
    </script> 
  </body>
</html>
