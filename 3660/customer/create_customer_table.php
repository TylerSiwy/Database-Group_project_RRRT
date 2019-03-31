<?php
function create_customer_table(){
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
$sql = "CREATE TABLE Customer (
    first_name varchar(20), 
    last_name varchar(20),
    dob date,  /*date datatype*/
    gender varchar(20),
    building_number int,
    street varchar(20), 
    city varchar(20),
    province varchar(20), 
    postal_code char(6),
    phone_number varchar(10),
    primary key(first_name, last_name, phone_number));
";

if ($con->query($sql) === TRUE) {
    echo "Customer Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>