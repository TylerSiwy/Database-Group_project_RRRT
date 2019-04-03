<?php
function create_repair_table(){
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
$sql = "CREATE TABLE Repairs (
    vin char(17),
    purchase_date date,
    repair_number char(5),
    problem varchar(100), /*description ex: flat tire*/
    cost_estimate numeric(9,2),
    cost_actual numeric(9,2),
    primary key(vin, purchase_date, repair_number),
    foreign key(vin, purchase_date) references Used_Vehicle(vin, purchase_date));";

if ($conn->query($sql) === TRUE) {
    echo " Repair table created successfully ;)"."<br>";
} else {
    echo "Error creating table :(	" . $conn->error."<br>";
}

$conn->close();
}
?>