<?php require_once('../src/your-listings.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Listings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php require_once('../src/inc/navbar.php'); ?>

    <div class="container">
        <h1 class="mb-3 text-center" style="margin-top: 00px">Manage Listings</h1>

        <?php
        $query = "SELECT * FROM Houses WHERE user_id='$user_id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Update Status</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['house_id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['availability_status']; ?></td>
                        <td>
                        <form method="post" class="form-inline">
                            <input type="hidden" name="house_id" value="<?php echo $row['house_id']; ?>">
                            <div class="row">
                                <div class="col">
                                    <select name="status" class="form-select">
                                        <option value="Available" <?php echo ($row['availability_status'] === 'Available') ? 'selected' : ''; ?>>Available</option>
                                        <option value="Rented" <?php echo ($row['availability_status'] === 'Rented') ? 'selected' : ''; ?>>Rented</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                                </div>
                            </div>
                        </form>
                    </td>
                        <td> 
                        <form method="post">
                            <input type="hidden" name="house_id" value="<?php echo $row['house_id']; ?>">
                            <button type="submit" name="delete_listing" class="btn btn-danger">Delete Listing</button>
                        </form>
                    </td> 
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        } else {
            echo '<div class="alert alert-danger">You have no listings.</div>';
        }
    ?>
    </div>
</body>
</html>