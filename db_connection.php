<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password='';
$dbname = "IMS";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute a SQL query
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>