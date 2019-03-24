<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Dealership";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Vehicle (
    vin char(17),
    year int, /* year datatype*/
    model varchar(20),
    edition char(2),
    km int,
    interior_color varchar(20),
    exterior_color varchar(20),
    purchase_date char(10), /*date datatype*/
    primary key(vin))
";

if ($conn->query($sql) === TRUE) {
    echo "Vehicle Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>