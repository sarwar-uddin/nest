<?php require_once('../src/property-details.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Property Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Include jQuery and FancyBox CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <style>
        .lightbox {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .thumbnail {
            width: 420px; /* width of the thumbnail */
            height: 280px; /* height of the thumbnail */
            object-fit: cover; /* aspect ratio and cover the container */
        }

        .no-gutters {
            margin-right: 0;
            margin-left: -1.8;
        }
    </style>
</head>
<body>
    <?php require_once('../src/inc/navbar.php'); ?>
    <div class="container" style="margin-top: 0px;">
        <h1><?= $propertyDetails['title']; ?></h1>
        <div class="row py-3 shadow-5 no-gutters">
            <?php
            $result->data_seek(0); // Reset the result set pointer
            while ($row = $result->fetch_assoc()) {
                if ($row['filename']) {
                    echo '<div class="col-4 mt-0">';
                    echo '<a data-fancybox="gallery" href="' . $row['filename'] . '">';
                    echo '<img src="' . $row['filename'] . '" alt="Property Image" class="thumbnail">';
                    echo '</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        <p style="font-size: 2.3em; text-align: left;">
            <span style="float: left;">৳<?= $propertyDetails['rent']; ?></span>
            <a href="send-message.php" class="btn btn-primary" style="float: right;  font-size: 0.5em;">&#x1F4E7; Contact</a>
            <br>
        </p>
        <p style="font-size: 1.3em;"><?= $propertyDetails['address']; ?>, <?= $propertyDetails['city']; ?></p>
        <p style="font-size: 1.25em;">&#x1F6CF; <?= $propertyDetails['bedrooms']; ?> Beds &#x1F6BD; <?= $propertyDetails['bathrooms']; ?> Baths &#x1F4CF; <?= $propertyDetails['square_feet']; ?> sq. ft </p>
        <br>
        <h4>Description</h3><hr>
        <p><?= nl2br($propertyDetails['description']); ?></p>
    </div>
</body>
</html>
