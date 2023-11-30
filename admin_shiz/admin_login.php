<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>

    <?php
    // Check if the user is already logged in
    session_start();

    //ini jangan diopen, biarin aja wkwkw
    /*if(isset($_SESSION['admin_username'])){
        header("Location: admin_dashboard.php");
        exit();
    }*/

    // Check if the login form is submitted
    if(isset($_POST['submit'])){
        require_once('koneksi.php'); // Include your database connection file

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate user credentials
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $query);

        if($result && mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
        
            // Check the role of the user
            if ($user['role'] === 'admin') {
                $_SESSION['admin_username'] = $username;
                header("Location: admin_dashboard.php");
                exit();
            } elseif ($user['role'] === 'adminhimastika') {
                $_SESSION['admin_username'] = $username;
                header("Location: admin_himastika/admin_himaboard.php");
                exit();
            }
            elseif ($user['role'] === 'adminhumanis') {
                $_SESSION['admin_username'] = $username;
                header("Location: admin_humanis/admin_humaboard.php");
                exit();
            }
            elseif ($user['role'] === 'adminbemf') {
                $_SESSION['admin_username'] = $username;
                header("Location: admin_bemf/admin_bemboard.php");
                exit();
            }
            elseif ($user['role'] === 'admindpmf') {
                $_SESSION['admin_username'] = $username;
                header("Location: admin_dpmf/admin_dpmboard.php");
                exit();
            }
        } else {
            // Invalid credentials, show an error message
            echo "<p style='color: red;'>Invalid username or password.</p>";
        }

        // Close the database connection
        mysqli_close($connection);
    }
    ?>

    <!-- Admin Login Form -->
    <form action="admin_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>
