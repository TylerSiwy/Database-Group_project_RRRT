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
	$vin = (int)$_POST["vin_text"];
	$year = (int)$_POST["year_text"];
	$model = $_POST["model_text"];
	//$vin = (int)$vin;

	// if(is_int($vin)){
	// 	echo "CORRECT:".($vin)." ".gettype($vin)."<br>";
	// } else {
	// 	echo "NOT AN INT, Retard";
	// 	echo ", it is a ".gettype($vin);
	// 	exit;
	// }

	// Insertion
	$sql="INSERT INTO vehicle (VIN, Year, Model)
	VALUES
	($vin, $year, $model)";

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