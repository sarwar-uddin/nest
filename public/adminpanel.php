<?php
    session_start();
    
    // Check if the user is logged in and has admin privileges
    if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
        // Redirect the user to the login page
        header('Location: login.php');
        exit();
    }
    
    require_once ('../config/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
    <?php require_once('../src/inc/navbar.php'); ?>
    <main>
            <div class="container">
                <h1 class="text-center mb-3" style="margin-top: 10px;">Welcome to the Admin Panel</h1>
            </div>
            <div class="container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Purpose</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Users</td>
                            <td>List and Manage Users and Roles</td>
                            <td><a href="users.php" class="btn btn-primary">Go to Page</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html>
