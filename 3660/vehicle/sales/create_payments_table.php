<?php
function create_payments_table(){
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
$sql = "CREATE TABLE  Payments (
    _sid char(5),
    payment_number char(5),
    paid_date date, /*date datatype*/
    due_date int, /*day of the month*/
    amount int,
    bank_account int,
    primary key(_sid, payment_number),
    foreign key(_sid) references Sale(_sid))
";

if ($con->query($sql) === TRUE) {
    echo "Payments Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $con->error."<br>";
}

$con->close();
}
?>