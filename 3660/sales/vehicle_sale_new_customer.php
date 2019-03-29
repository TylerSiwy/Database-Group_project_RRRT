
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
//For New_Vehicle Insertion
$VIN = isset($_POST["vin_input"]) ? (int)$_POST["vin_input"]:-1;
$expected_kms = isset($_POST["expected_kms_input"]) ? (int)$_POST["expected_kms_input"]:-1;
$msrp = $_POST["msrp_input"];

//For Vehicle Insertion
$Year = (int)$_POST["year_input"];
$Model = $_POST["model_input"];
$Edition = $_POST["edition_input"];
$Colour_Interior= $_POST["colour_interior_input"];
$Colour_Exterior= $_POST["colour_exterior_input"];
$Purchase_Date = $_POST["purchase-date_input"];


// Insertion
$sql="INSERT INTO New_Vehicle
VALUES
($VIN, $expected_kms, $msrp)";

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Records inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

mysqli_close($con);

//Insert into Vehicle as well
vehicleInsertion($VIN, $Year, $Model, $Edition,
	 $Colour_Exterior, $Colour_Interior, $Purchase_Date);

?>