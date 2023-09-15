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
$textarea1 = $_POST['textarea1'];
$textarea2 = $_POST['textarea2'];
$textarea3 = $_POST['textarea3'];
$textarea4 = $_POST['textarea4'];

// Insert form data into the database
$sql = "INSERT INTO test3 (textarea1, textarea2, textarea3, textarea4) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $textarea1, $textarea2, $textarea3, $textarea4);

if ($stmt->execute()) {
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}

// Close the database connection
$conn->close();
?>
