<?php
function create_new_vehicle_table(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dealership";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
} 

// sql to create table
$sql = "CREATE TABLE New_Vehicle (
    vin char(17),
    expected_km int,
    msrp numeric(9,2),
    primary key(vin),
    foreign key(vin) references Vehicle(vin))
";

if ($conn->query($sql) === TRUE) {
    echo "Vehicle Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

$conn->close();
}
?>