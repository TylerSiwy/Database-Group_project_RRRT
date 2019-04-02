<?php
function create_sale_warranty_table(){
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
$sql = "CREATE TABLE Sale_Warranty (
    pid char(5),
    _sid char(5),
    deductible numeric(9,2),
    price numeric(9,2),
    co_signer varchar(40),
    primary key(pid),
    foreign key(pid) references Warranty(pid),
    foreign key(_sid) references Sale(_sid));";

if ($con->query($sql) === TRUE) {
    echo "Sale_Warranty created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>