<?php
function create_sale_customer_table(){
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
$sql = "CREATE TABLE Sale_Customer (
    first_name varchar(20), 
    last_name varchar(20),
    phone_number varchar(10),
    _sid char(5),
    primary key(_sid),
    foreign key(first_name, last_name,phone_number) references Customer(first_name, last_name,phone_number),
    foreign key(_sid) references Sale(_sid));
";

if ($con->query($sql) === TRUE) {
    echo "Sale Customer Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>