<?php
// start the session
session_start();

require_once('../config/connection.php');

// check if the user is already logged in
if(isset($_SESSION['user_id'])) {
  // redirect to home page if the user is already logged in
  header('Location: index.php');
}

// initialize errors array
$errors = [];

// handle form submission
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // get the username and password from the form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // query the database to find a matching username and password hash
  $query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) > 0) { // if user exists
    $user_data = mysqli_fetch_assoc($result);
    $stored_password_hash = $user_data['password'];
    $user_role = $user_data['user_role']; // get the user role from the database

    // verify the password hash using the PHP password_verify() function
    if(password_verify($password, $stored_password_hash)) {
      // set session variables and redirect to home page
      $_SESSION['user_id'] = $user_data['user_id'];
      $_SESSION['username'] = $user_data['username'];
      $_SESSION['user_role'] = $user_role; // set the user role in the session
      header('Location: index.php');
      exit();
    } else {
      // add error message to array
      $errors[] = "Invalid username or password";
    }
  } else {
    // add error message to array
    $errors[] = "Invalid username or password";
  }

  // close the database connection
  mysqli_close($conn);
}
?>
