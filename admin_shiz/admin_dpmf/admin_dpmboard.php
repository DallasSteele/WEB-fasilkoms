<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="a_dpm.css">
    <title>A-DPM Dashboard</title>
</head>
<body>
    <?php
    session_start();
    // Check if the user is not logged in, redirect to the login page
    if(!isset($_SESSION['admin_username'])){
        header("Location: admin_login.php");
        exit();
    }
    ?>

    <h2>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h2>
    <p>This is the admin dashboard.</p>

    <!-- Add links or functionality for managing accountability reports here -->

    <br>
    <a href="admin_logout.php">Logout</a>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Your Brand</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-primary text-white text-center">
    <div class="container">
      <h1 class="display-4">Your Catchy Headline</h1>
      <p class="lead">A short description of what your website is about.</p>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2>Section Heading</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="https://via.placeholder.com/700x400" alt="Placeholder Image">
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>



</body>
</html>
