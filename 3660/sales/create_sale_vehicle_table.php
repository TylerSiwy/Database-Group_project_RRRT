<?php
function create_sale_vehicle_table(){
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Sale_Vehicle (
    vin char(17),
    purchase_date date,
    _sid char(5),
    primary key(_sid),
    foreign key(vin,purchase_date) references Vehicles(vin, purchace_date),
    foreign key(_sid) references Sale(_sid));
";

if ($con->query($sql) === TRUE) {
    echo "Sale vehicle Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>