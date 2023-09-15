<?php
// Database configuration (update with your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$company = $_POST['company'];
$role = $_POST['role'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

// Insert form data into the database
$sql = "INSERT INTO form_data (name, company, role, email, telephone) VALUES ('$name', '$company', '$role', '$email', '$telephone')";

if ($conn->query($sql) === TRUE) {
    // Redirect to thank-you page
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
