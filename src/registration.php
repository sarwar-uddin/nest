<?php
require_once('../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_role = $_POST['user_role'];

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) > 0) {
            echo "<p>Username already taken</p>";
        } else {
            $errors = [];
    
            if (empty($username)) { $errors[] = "Username is required"; }
            if (empty($email)) { $errors[] = "Email is required"; }
            if (empty($password)) { $errors[] = "Password is required"; }
    
            if ($password != $confirm_password) {
                $errors[] = "The two passwords do not match";
            }
    
            if (strlen($password) < 8) {
                $errors[] = "Password must be at least 8 characters long";
            }
            //hash the password using bcrypt and store user data in the database
            if (empty($errors)) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                //insert user data into the database
                $query = "INSERT INTO users (username, email, password, first_name, last_name, user_role) VALUES ('$username', '$email', '$hashed_password', '$first_name', '$last_name', '$user_role')";
                $result = mysqli_query($conn, $query);
                // redirect to login.php
                $_SESSION['loggedin'] = true;
                header('location: login.php');
                exit();
            } else {
                // Display error messages
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
            }
        }
        //close connection
        mysqli_close($conn);
    }
    ?>

