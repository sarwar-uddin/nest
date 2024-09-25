<?php session_start(); 
    require_once('../src/add-property.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>List Your Property</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    </head>
    <body>
        <?php require_once('../src/inc/navbar.php'); ?>

        <!-- User is logged in and has 'owner' role. -->
        <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'owner' || $_SESSION['user_role'] === 'admin')) { ?>
        
        <?php require_once('../src/add-property.php'); ?>

        <div class="container" style="margin-top: 10px;">
            <h1 style="text-align: center;">List Your Property</h1>
            <form method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required />
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="rent">Rent</label>
                        <input type="number" id="rent" name="rent" class="form-control" required />
                    </div>
                    <div class="col">
                        <label for="date_of_availability">Date of Availability</label>
                        <input type="date" id="date_of_availability" name="date_of_availability" class="form-control" required />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required />
                    </div>
                    <div class="col">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" required />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="bedrooms">Bedrooms</label>
                        <input type="number" id="bedrooms" name="bedrooms" class="form-control" required />
                    </div>
                    <div class="col">
                        <label for="bathrooms">Bathrooms</label>
                        <input type="number" id="bathrooms" name="bathrooms" class="form-control" required />
                    </div>
                    <div class="col">
                        <label for="square_feet">Square Feet</label>
                        <input type="number" id="square_feet" name="square_feet" class="form-control" required />
                    </div>
                </div>
                <!-- Image URL input fields -->
                <div class="form-group">
                    <label for="image1">Image 1 URL</label>
                    <input type="text" id="image1" name="image1" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="image2">Image 2 URL</label>
                    <input type="text" id="image2" name="image2" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="image3">Image 3 URL</label>
                    <input type="text" id="image3" name="image3" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="10" required></textarea>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                </div>
            </form>
        </div>
        <!-- User is not logged in as 'owner' -->
        <?php } else { ?>
        <div class="container" style="margin-top: 100px;">
            <div class="alert alert-danger">
                You must log in as an Owner to list a property.
            </div>
            <p style="text-align: center;">
                <a href="login.php" class="btn btn-primary">Log In</a>
            </p>
        </div>
        <?php } ?>
    </body>
</html>
