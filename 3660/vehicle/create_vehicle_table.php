<?php
function create_vehicle_table(){
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
$sql = "CREATE TABLE Vehicle (
    vin char(17),
    _year int, /* year datatype*/
    model varchar(20),
    _edition char(2),
    interior_color varchar(20),
    exterior_color varchar(20),
    purchase_date date, /*date datatype*/
    primary key(vin, purchase_date));
";

if ($conn->query($sql) === TRUE) {
    echo "Vehicle Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

$conn->close();
}
?>