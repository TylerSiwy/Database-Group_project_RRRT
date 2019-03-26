<?php
function create_employment_history_table(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dealership";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Employment_History (
    cid char(5),
    start_date date,
    job_title varchar(20),
    supervisor varchar(20),
    company_name varchar(20),
    phone_number varchar(10),
    street integer, 
    province varchar(20), 
    city varchar(20),
    postal_code char(6),
    primary key(cid, start_date, job_title),
    foreign key(cid) references customer(cid))"
;

if ($conn->query($sql) === TRUE) {
    echo "Employment History Table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

$conn->close();
}
?>