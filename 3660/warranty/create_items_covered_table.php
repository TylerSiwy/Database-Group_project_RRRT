<?php
function create_items_covered_table(){
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
$sql = "CREATE TABLE items_covered (
    pid char(5),
    item  varchar(20),
    primary key(pid, item),
    foreign key(pid) references Warranty(pid));";

if ($con->query($sql) === TRUE) {
    echo "items_covered created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>