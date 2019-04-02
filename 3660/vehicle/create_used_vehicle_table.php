<?php
function create_used_vehicle_table(){
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
$sql = "CREATE TABLE Used_Vehicle (
    vin varchar(17),
    purchase_date date,
    current_km int,
    bought_from varchar(20),
    purchase_location varchar(20),
    price_paid numeric(9,2),
    book_price numeric(9,2),
    primary key(vin, purchase_date),
    foreign key(vin, purchase_date) references Vehicle(vin, purchase_date));";

if ($conn->query($sql) === TRUE) {
    echo "Used_Vehicle Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

$conn->close();
}
?>