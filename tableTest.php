<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dealership";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE vehicle (
VIN INT(17) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Year INT(4) NOT NULL,
Model VARCHAR(30) NOT NULL,
Edition VARCHAR(2),
KM INT(7),
Colour_Exterior VARCHAR(30),
Colour_Interior VARCHAR(30),
)";

if ($conn->query($sql) === TRUE) {
    echo "Vehicle Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>