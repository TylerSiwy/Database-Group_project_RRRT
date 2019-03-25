<?php
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
$sql = "CREATE TABLE Customer (
	cid integer(20) UNSIGNED AUTO_INCREMENT,
    first_name varchar(20), 
    last_name varchar(20), 
    dob varchar(10),
    gender varchar(20),
    street integer(10), 
    province varchar(100), 
    city varchar(100),
    postal_code varchar(100),
    phone_number varchar(10),
    primary key(cid)
)";

if ($con->query($sql) === TRUE) {
    echo "Customer Table created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

$con->close();
?>