<html>
	<body>
	<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dealership";

	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}

	$VIN = (int)$_POST["vin_input"];
	$expected_kms = (int)$_POST["expected_kms_input"];
    $msrp = $_POST["msrp_input"];

	// Insertion
	$sql="INSERT INTO New_Vehicle
	VALUES
	($VIN, $expected_kms, $msrp)";

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