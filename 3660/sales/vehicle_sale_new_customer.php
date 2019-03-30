
<?php
include "vehicle_insertion.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dealership";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

//For Customer
$VIN = $_POST['']
$first = $_POST["first_input"];
$last = $_POST["last_input"];
$dob = $_POST["dob_input"];
$gender = $_POST["gender_input"];
$street = (int)$_POST["street_input"];
$province = $_POST["province_input"];
$city = $_POST["city_input"];
$postal_code = $_POST["postal_input"];
$phone_number = $_POST["phone_input"];

$sql="INSERT INTO customer 
(first_name, last_name, dob, gender, street, province, city, postal_code, phone_number) 
VALUES 
('$cid', '$first', '$last', '$dob', '$gender', '$street', '$province', '$city', 
'$postal_code', '$phone_number')";

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Records inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

mysqli_close($con);

//Delete vehicle using VIN

?>