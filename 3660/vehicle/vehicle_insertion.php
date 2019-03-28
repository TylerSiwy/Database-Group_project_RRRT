<html>
	<body>
	<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dealership";

	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}

	//$vin = ""
	$VIN = (int)$_POST["vin_input"];
	$Year = (int)$_POST["year_input"];
    $Model = $_POST["model_input"];
    $Edition = $_POST["edition_input"];
    $KMs = $_POST["KMs_input"];
    $Colour_Exterior= $_POST["colour_exterior_input"];
    $Colour_Interior= $_POST["colour_interior_input"];
    $Purchase_Date = $_POST["purchase-date_input"];

	// Insertion
	$sql="INSERT INTO used_vehicle (vin, year, model, edition, km, colour_Interior, colour_exterior)
	VALUES
	($VIN, $Year, $Model, $Edition, $KMs, $Colour_Exterior, $Colour_Interior)";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
	exit;

	$result = mysqli_query($con, $sql) or trigger_error(mysqli_error($con));	
	mysqli_close($con);
	?>

	</body>
</html>