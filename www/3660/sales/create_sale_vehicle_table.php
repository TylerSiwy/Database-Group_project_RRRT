<?php
function create_sale_vehicle_table(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dealership";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Sale_Vehicle (
    vin char(5),
    sid char(5),
    primary key(sid),
    foreign key(vin) references Vehicles(vin),
    foreign key(sid) references Sale(sid));
";

if ($con->query($sql) === TRUE) {
    echo "Sale vehicle Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>