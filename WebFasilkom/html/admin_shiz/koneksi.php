<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "fasilkom";

$connection = mysqli_connect($hostname, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


/*
$host = "localhost";
$username = "root";
$password = "";
$database = "FASILKOM";

$connection = new mysqli($host, $username, $password, $database);

// Check if form is submitted
if ($connection->connect_error){
    die("Connection failed: ".$connection->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    //output a notification
    echo "Form submitted! Email : " . $email . ", Password" . $password ;

    // Insert the form data into the database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    if ($connection->query($sql) === true) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close the database connection
$connection->close();*/
/*
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "FASILKOM";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['submit'])) {
    $image = $_FILES['image']['name'];  // Get the uploaded image filename
    $name = $_POST['name'];
    $position = $_POST['position'];

    // Move the uploaded image to a folder
    $uploadDirectory = 'uploads/';
    $targetFilePath = $uploadDirectory . $image;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        // Image upload was successful

        // Insert the form data into the database
        $sql = "INSERT INTO users (image, name, position) VALUES ('$image', '$name', '$position')";

        if ($connection->query($sql) === true) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    } else {
        echo "Image upload failed!";
    }
}

$connection->close();
*/
?>

