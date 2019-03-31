<?php
function create_warranty_table(){
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
$sql = "CREATE TABLE Warranty (
    policy_number char(5),
    co_signer varchar(40),
    warranty_length int, /*months*/
    _start_date date,  /*date datatype*/
    deductible numeric(9,2),
    price numeric(9,2),
    primary key(policy_number))
";

if ($con->query($sql) === TRUE) {
    echo "Warranty created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>