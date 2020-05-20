<?php
function create_employee_table(){
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Employee (
    eid char(5),
    first_name varchar(20), 
    last_name varchar(20),
    phone_number varchar(10),
    primary key(eid))";
;

if ($conn->query($sql) === TRUE) {
    echo "Employee Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

$conn->close();
}
?>