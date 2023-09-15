<?php
// Database connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mydatabase';
$table = 'form_data';

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function downloadTextFile($data)
{
    // Set the content type to plain text and specify attachment
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="data.txt"');

    // Output the data to the response
    echo $data;
    exit; // Terminate the script after download
}

if (isset($_POST['download'])) {
    // Query to fetch data from the table
    $query = "SELECT * FROM $table";
    $result = $conn->query($query);

    // Check for query errors
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $textData = "Name\tCompany\tRole\tEmail\tTelephone No\n";
    while ($row = $result->fetch_assoc()) {
        $textData .= $row['name'] . "\t" . $row['company'] . "\t" . $row['role'] . "\t" . $row['email'] . "\t" . $row['telephone'] . "\n";
    }

    // Trigger the download
    downloadTextFile($textData);
}

// Generate HTML to display the data in a table
echo "<html>";
echo "<head>";
echo "<title>Data from MySQL</title> <title>E-Survey</title><link rel='icon' href='./Assets/fav.png' type='image/png'>";
echo "</head>";
echo "<body>";
echo "<h1>Data from MySQL Table</h1>";
echo "<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table.table-lines {
    border: 2px solid #f00; 
}


.table-lines th {
    padding: 10px;
    text-align: left;
    border: 2px solid #0081fa; 
}

.table-lines td {
    padding: 10px;
    text-align: left;
    border: 2px solid #0081fa;
}
.btn{
background:#0081fa;
color:#ffffff;
padding:13px 28px; 
outline:none;
border:none;
border-radius:20px
}
</style>";

// Query to fetch data from the table
$query = "SELECT * FROM $table";
$result = $conn->query($query);

// Check for query errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

echo "<table border='1' class='table-lines'>";
echo "<tr><th>Name</th><th>Company</th><th>Role</th><th>Email</th><th>Telephone No</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['company'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['telephone'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<form method='post' action=''> <br/><br/><br/><br/>
    <input type='submit' name='download' value='Download Data as Text File' class='btn'>
</form>";
echo "<br/>";
echo "<a href='/h'>back to Dashboard</a>";
echo "</body>";
echo "</html>";

// Close the database connection
$conn->close();
