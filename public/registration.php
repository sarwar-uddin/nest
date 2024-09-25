<?php require_once('../src/registration.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    </head>
    <body>
        <?php require_once('../src/inc/navbar.php'); ?>
        <div class="container mt-5">
            <h1 style="margin-top: 0px;">Registration</h1>
            <form method="post">
                <?php if(isset($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                    <p><?php echo $error ?></p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="mb-2 row">
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required="" />
                    </div>
                    <div class="col-md-6">
                        <label for="user_role" class="form-label">Select your role:</label>
                        <select class="form-select" name="user_role" required>
                            <option value="tenant">Tenant</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                </div>

                <div class="mb-2 row">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>" />
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>" />
                    </div>
                </div>
                <div class="mb-2"><label for="email" class="form-label">Email</label> <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required="" /></div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label> <input type="password" class="form-control" id="password" name="password" onkeyup="validatePassword()" required="" />
                    <div id="password-error" class="invalid-feedback"></div>
                </div>
                <div class="mb-2">
                    <label for="confirm_password" class="form-label">Confirm Password</label> <input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup="validateConfirmPassword()" required="" />
                    <div id="confirm-password-error" class="invalid-feedback"></div>
                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <p class="mt-2">Already Registered? <a href="login.php">Login!</a></p>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script>
            function validatePassword() {
                var passwordInput = document.getElementById("password");
                var passwordLength = passwordInput.value.length;
                var errorElement = document.getElementById("password-error");

                if (passwordLength < 8) {
                    errorElement.innerHTML = "Password must be at least 8 characters long";
                    passwordInput.classList.add("is-invalid"); // Add bootstrap invalid class
                } else {
                    errorElement.innerHTML = "";
                    passwordInput.classList.remove("is-invalid");
                }
            }

            function validateConfirmPassword() {
                var passwordInput = document.getElementById("password");
                var confirmPasswordInput = document.getElementById("confirm_password");
                var errorElement = document.getElementById("confirm-password-error");

                if (passwordInput.value != confirmPasswordInput.value) {
                    errorElement.innerHTML = "Passwords do not match";
                    passwordInput.classList.add("is-invalid"); // Add bootstrap invalid class
                    confirmPasswordInput.classList.add("is-invalid");
                } else {
                    errorElement.innerHTML = "";
                    passwordInput.classList.remove("is-invalid");
                    confirmPasswordInput.classList.remove("is-invalid");
                }
            }
        </script>
    </body>
</html>
