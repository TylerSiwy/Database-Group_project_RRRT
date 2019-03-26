<?php
function create_sale_customer_table(){
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
$sql = "CREATE TABLE  Sale_Customer (
    cid char(5),
    sid char(5),
    primary key(sid),
    foreign key(cid) references Customer(cid),
    foreign key(sid) references Sale(sid))
";

if ($con->query($sql) === TRUE) {
    echo "Sale Customer Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>