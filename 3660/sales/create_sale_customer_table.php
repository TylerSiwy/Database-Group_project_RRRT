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
$sql = "CREATE TABLE  Sale_Customer (
    cid char(5),
    _sid char(5),
    primary key(_sid),
    foreign key(cid) references Customer(cid),
    foreign key(_sid) references Sale(_sid))
";

if ($con->query($sql) === TRUE) {
    echo "Sale Customer Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>