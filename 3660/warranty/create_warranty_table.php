<?php
function create_warranty_table(){
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
$sql = "CREATE TABLE Warranty (
    policy_number char(5),
    warranty_length int, /*months*/
    deductible numeric(9,2),
    price numeric(9,2),
    primary key(policy_number));
";

if ($con->query($sql) === TRUE) {
    echo "Warranty created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>