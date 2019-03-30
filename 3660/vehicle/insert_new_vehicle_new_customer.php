
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
//For Customer Insertion
$f_name = isset($_POST["first_input"]) ? (int)$_POST["first_input"]:-1;
$l_name = isset($_POST["last_input"]) ? (int)$_POST["last_input"]:-1;
$DOB = isset($_POST["dob_input"]) ? (int)$_POST["dob_input"]:-1;
$gender = isset($_POST["gender_input"]) ? (int)$_POST["gender_input"]:-1;
$street = isset($_POST["street_input"]) ? (int)$_POST["street_input"]:-1;
$province = isset($_POST["province_input"]) ? (int)$_POST["province_input"]:-1;
$city = isset($_POST["city_input"]) ? (int)$_POST["city_input"]:-1;
$postal_code = isset($_POST["postal_input"]) ? (int)$_POST["postal_input"]:-1;
$phone_number = isset($_POST["phone_input"]) ? (int)$_POST["phone_input"]:-1;

//For vehicle deletion
$VIN = isset($_POST["vin_input"]) ? (int)$_POST["vin_input"]:-1;

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Records inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

mysqli_close($con);

?>