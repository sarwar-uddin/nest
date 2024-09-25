<?php require_once('../src/users.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php require_once('../src/inc/navbar.php'); ?>

    <div class="container">
        <h1 class="mb-3 text-center" style="margin-top: 00px">Manage Users</h1>
        <form method="post" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search users by username" value="<?= $searchQuery ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Role</th>
                    <th>Update Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['user_id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['user_role'] ?></td>
                        <td>
                            <form method="post" class="d-flex justify-content-end">
                                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                <div class="me-3">
                                    <select name="user_role" class="form-select">
                                        <option value="admin" <?= ($user['user_role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
                                        <option value="owner" <?= ($user['user_role'] === 'owner') ? 'selected' : '' ?>>Owner</option>
                                        <option value="tenant" <?= ($user['user_role'] === 'tenant') ? 'selected' : '' ?>>Tenant</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
