<?php
// Database connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mydatabase';
$table = 'test3';

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

    $textData = "Que 01\tQue 02\tQue 03\tQue 04\t\n";
    while ($row = $result->fetch_assoc()) {
        $textData .= $row['textarea1'] . "\t" . $row['textarea2'] . "\t" . $row['textarea3'] . "\t" . $row['textarea4'] . "\n";
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
echo "<tr><th>Que_01</th><th>Que_02</th><th>Que_03</th><th>Que_04</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['textarea1'] . "</td>";
    echo "<td>" . $row['textarea2'] . "</td>";
    echo "<td>" . $row['textarea3'] . "</td>";
    echo "<td>" . $row['textarea4'] . "</td>";
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
