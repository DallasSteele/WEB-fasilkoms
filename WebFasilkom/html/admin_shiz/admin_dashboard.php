<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .dashboard-header {
      background-color: #343a40;
      color: #ffffff;
      padding: 20px;
    }
    .dashboard-sidebar {
      background-color: #343a40;
      color: #ffffff;
      padding: 20px;
      height: 100vh;
    }
    .dashboard-content {
      padding: 20px;
    }
  </style>
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

  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 d-md-block sidebar dashboard-sidebar">
        <h2>Admin Dashboard</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Proker
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_logout.php">
                Logout
            </a>
          </li>
          <!-- Add more menu items as needed -->
        </ul>
      </div>

      <!-- Main content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <!-- Header -->
        <div class="dashboard-header">
          <h1>Welcome, Admin!</h1>
        </div>

        <!-- Content -->
        <div class="dashboard-content">
          <h2>Dashboard Overview</h2>
          <p>This is the main content of your admin dashboard. You can customize and add more sections based on your requirements.</p>

          <div class="content-rows" id="content-row-1">
        <div class="content-images">
            <img src="https://via.placeholder.com/400" alt="Image 1">
        </div>
        <div class="content-texts">
            <h2 contenteditable="true">FASTHER</h2>
            <h4 contenteditable="true">HIMASTIKA & HUMANIS</h4>
            <p contenteditable="true">*TEMA*</p>
            <button onclick="saveContent(1)">Save Changes</button>
        </div>
    </div>

    <!-- Repeat similar structure for other content rows -->

    <script>
        function saveContent(rowNumber) {
            const row = document.getElementById(`content-row-${rowNumber}`);
            const h2 = row.querySelector('h2');
            const h4 = row.querySelector('h4');
            const p = row.querySelector('p');

            const data = {
                title: h2.innerText,
                subhead: h4.innerText,
                theme: p.innerText
            };

          // Send the data to the server
    fetch('update_proker.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ rowNumber, data }),
    })
             .then(response => response.json())
             .then(responseData => {
                 console.log(responseData);
              // Handle the server response as needed
             })
            .catch(error => console.error('Error sending data to server:', error));
            console.log(`Saving changes for content row ${rowNumber}:`, data);
        }
    </script>
        </div>

      </main>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>



</body>
</html>
