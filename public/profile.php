<?php require_once('../src/profile.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .smaller {
            font-size: 0.6em;
        }
    </style>
</head>
<body>
<?php require_once('../src/inc/navbar.php'); ?>
    <div class="container my-6">
        <h1 class="text-center" style="margin-top: 10px">
            <?php echo $user['first_name'].' '.$user['last_name']; ?>
            <small class="text-danger smaller"><?php echo $user['user_role']; ?></small>
        </h1> 
        <table class="table table-striped" style="margin-top: 50px">
            <tbody>
                <tr>
                    <th>Username:</th>
                    <td><?php echo $user['username']; ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $user['email']; ?></td>
                </tr>
                <tr>
                    <th>First Name:</th>
                    <td><?php echo $user['first_name']; ?></td>
                </tr>
                <tr>
                    <th>Last Name:</th>
                    <td><?php echo $user['last_name']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
