<?php
// session_start();
$isloggedin = isset($_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ARDHAS SCHOOL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-..." crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</head>
<style>
  .navbar-scrolled,
  .offcanvas-body {
    background-color: #000;
  }

  .navbar-toggler-icon {

    background-color: #fff;
  }

  /* .dropdown-menu {
    z-index: 1000;
  } */
</style>
<!-- <?php
$current_page = basename($_SERVER['PHP_SELF']); ?> -->
<body class="vh-100 over-flow-hidden">
  <nav class="navbar navbar-expand-lg fixed-top border-bottom navbar-scrolled">
    <div class="container">
      <div class="d-flex">
        <img src="assets/images/logo.png" style="width:40px;height:40px;">

        <a class="navbar-brand text-white" href="#" style="font-weight: bold;">ARDHAS SCHOOL</a>
      </div>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header border-bottom">
          <div class="d-flex">
            <img src="assets/images/logo.png" style="width:40px;height:40px;">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ARDHAS SCHOOL</h5>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 text-black">
            <li class="nav-item <?= ($current_page == 'home.php') ? 'active' : '' ?>">
              <a class="nav-link active text-white" aria-current="page" href="home.php">Home</a>
            </li>

            <li class="nav-item <?= ($current_page == 'services') ? 'active' : '' ?>">
              <a class="nav-link active text-white" href="#services">Services</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active text-white" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" href="#contact">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active text-white" href="#gallery">
                Gallery
              </a>
              <!-- <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->

              <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Alumini Meet</a></li>
                    <li><a class="dropdown-item" href="#">Annual Day</a></li>
                    <li><a class="dropdown-item" href="#">Sports Day</a></li>
                    <li><a class="dropdown-item" href="#">Celebrations</a></li>

                    
                  </ul> -->
            </li>
          </ul>
          <div class="d-flex justify-content-center align-items-center gap-3">
            <?php if ($isloggedin) : ?>
              <a href="Logout.php" class="btn btn-primary text-decoration-none px-3 py-1 rounded-2">LOGOUT</a>
            <?php else : ?>
              <a href="Login.php" class="btn btn-primary text-decoration-none px-3 py-1 rounded-2">LOGIN</a>
            <?php endif; ?>
          </div>


        </div>
      </div>
    </div>
  </nav>




</body>


</html>