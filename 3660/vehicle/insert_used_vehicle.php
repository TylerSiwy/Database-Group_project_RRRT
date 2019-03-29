<html>
	<body>
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

	//For Used_Vehicle Relation
	$VIN = (int)$_POST["vin_input"];
	$current_kms = (int)$_POST["current_kms_input"];
    $bought_from = $_POST["bought_from_input"];
    $purchase_location = $_POST["purchase_location_input"];
    $price_paid = $_POST["price_paid_input"];
	$book_price = $_POST["book_price_input"];
	
	//For Vehicle Insertion
	$Year = (int)$_POST["year_input"];
	$Model = $_POST["model_input"];
	$Edition = $_POST["edition_input"];
	$Colour_Interior= $_POST["colour_interior_input"];
	$Colour_Exterior= $_POST["colour_exterior_input"];
	$Purchase_Date = $_POST["purchase-date_input"];

	// Insertion
	$sql="INSERT INTO used_vehicle (vin, current_kilometers, bought_from, purchase_location, price_paid, book_price)
	VALUES
	($VIN, \"$current_kms\", \"$bought_from\", \"$purchase_location\", \"$price_paid\", \"$book_price\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.<br>";
	} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}	
	mysqli_close($con);

	//Insert into Vehicle as well
	vehicleInsertion($VIN, $Year, $Model, $Edition,
	$Colour_Exterior, $Colour_Interior, $Purchase_Date);
	?>
	</body>
</html>