<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dealership";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*// Create database
$sql = "CREATE DATABASE dealership";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}*/

// sql to create table
$sql = "CREATE TABLE customer(
    name_first text, 
    name_last text, 
    DateOfBirth integer, 
    Gender integer,
    job_street integer, 
    job_province text, 
    job_city text,
    job_postal_code text );";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>