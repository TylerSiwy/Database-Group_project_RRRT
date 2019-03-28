<?php
function create_repair_table(){
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
$sql = "CREATE TABLE  Repairs (
    vin char(17),
    problem varchar(100), /*description ex: flat tire*/
    cost_estimate numeric(9,2),
    cost_actual numeric(9,2),
    primary key(vin,problem),
    foreign key(vin) references Used_Vehicle(vin))
";

if ($conn->query($sql) === TRUE) {
    echo " Repair table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

$conn->close();
}
?>