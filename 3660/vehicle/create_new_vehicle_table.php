<?php

function create_new_vehicle_table(){
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
} 

// sql to create table
$sql = "CREATE TABLE New_Vehicle (
    vin char(17),
    purchase_date date,
    expected_km int,
    msrp numeric(9,2),
    primary key(vin),
    foreign key(vin, purchase_date) references Vehicle(vin, purchase_date));";

if ($conn->query($sql) === TRUE) {
    echo "New_Vehicle Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

$conn->close();
}
?>