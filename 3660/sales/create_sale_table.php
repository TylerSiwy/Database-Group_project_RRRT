<?php
function create_sale_table(){
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
} 

// sql to create table
$sql = "CREATE TABLE Sale (
    _sid char(5),
    intrest_rate numeric(4,2),
    sale_price numeric(9,2),
    downpayment numeric(9,2),
    commission numeric(9,2),
    sale_date date,  /*date datatype*/
    primary key(_sid))
";

if ($conn->query($sql) === TRUE) {
    echo "Sale Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

$conn->close();
}
?>