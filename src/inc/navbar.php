<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.svg" alt="Logo" width="45" height="45"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="listings.php">Browse</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="add-property.php">List Property</a>
          </li>

      <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'owner' || $_SESSION['user_role'] === 'admin')) { ?>        
      <li class="nav-item">
        <a class="nav-link active" href="your-listings.php">Your Listings</a>
      </li>
      <?php } ?>

      <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && ($_SESSION['user_role'] === 'admin')) { ?>        
      <li class="nav-item">
        <a class="nav-link active" href="adminpanel.php" style="color:red;">Admin Panel</a>
      </li>
      <?php } ?>
        </ul>


      <form class="d-flex ms-auto" action="search.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search by City" aria-label="Search" name="query">
        <button class="btn btn-outline-success me-2" type="submit">Search</button>
      </form>
      <?php if(isset($_SESSION['user_id'])) { ?>

        <button class="btn btn-primary position-relative me-2" onclick="window.location.href='inbox.php'">
          Inbox
        </button>

        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle ms-1 me-2" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="profile.php?username=<?php echo $_SESSION['username']; ?>">Profile</a></li>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
      <?php } else { ?>
        <div>
          <a class="btn btn-outline-primary me-1" href="login.php">Log In</a>
          <a class="btn btn-primary me-1" href="registration.php">Sign Up</a>
        </div>
      <?php } ?>
    </div>
  </div>

</nav>
