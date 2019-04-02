
<?php
include "../credentials.php";
include "vehicle_insertion.php";
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
//For Customer Insertion
$customer_ID = isset($_POST["cid_input"]) ? (int)$_POST["cid_input"]:-1;
$f_name = isset($_POST["first_input"]) ? (int)$_POST["first_input"]:-1;
$l_name = isset($_POST["last_input"]) ? (int)$_POST["last_input"]:-1;
$DOB = isset($_POST["dob_input"]) ? (int)$_POST["dob_input"]:-1;
$gender = isset($_POST["gender_input"]) ? (int)$_POST["gender_input"]:-1;
$street = isset($_POST["street_input"]) ? (int)$_POST["street_input"]:-1;
$province = isset($_POST["province_input"]) ? (int)$_POST["province_input"]:-1;
$city = isset($_POST["city_input"]) ? (int)$_POST["city_input"]:-1;
$postal_code = isset($_POST["postal_input"]) ? (int)$_POST["postal_input"]:-1;
$phone_number = isset($_POST["phone_input"]) ? (int)$_POST["phone_input"]:-1;

//For vehicle insertion
$VIN = isset($_POST["vin_input"]) ? (int)$_POST["vin_input"]:-1;
$Year = (int)$_POST["year_input"];
$Model = $_POST["model_input"];
$Edition = $_POST["edition_input"];
$Colour_Interior= $_POST["colour_interior_input"];
$Colour_Exterior= $_POST["colour_exterior_input"];
$Purchase_Date = $_POST["purchase-date_input"];
$expected_kms = $_POST["expected_kms_input"];
$msrp = $_POST["msrp_input"];

// Insertion
$sql="INSERT INTO New_Vehicle
VALUES
('$VIN', '$Purchase_Date', '$expected_kms', '$msrp')";

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Records  inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

mysqli_close($con);

//Insert into Vehicle as well
vehicleInsertion($VIN, $Year, $Model, $Edition,
	$Colour_Interior, $Colour_Exterior, $Purchase_Date);

?>