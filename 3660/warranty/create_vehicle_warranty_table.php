<?php
function create_vehicle_warranty_table(){
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
$sql = "CREATE TABLE Vehicle_Warranty (
    policy_number char(5),
    vin char(17),
    co_signer varchar(40),
    primary key(policy_number),
    foreign key(policy_number) references Warranty(policy_number),
    foreign key(vin) references Vehicle(vin));";

if ($con->query($sql) === TRUE) {
    echo "Vehicle_Warranty created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>