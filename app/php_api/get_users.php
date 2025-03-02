<?php
$servername = "localhost";  // Change if needed
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password (empty if default)
$dbname = "sia1";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get users
$sql = "SELECT * FROM tbl_user";
$result = $conn->query($sql);

$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($users);

$conn->close();
?>
