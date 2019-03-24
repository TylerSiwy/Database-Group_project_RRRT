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
	$current_kms = (int)$_POST["current_kms_input"];
    $bought_from = $_POST["bought_from_input"];
    $purchase_location = $_POST["purchase_location_input"];
    $price_paid = $_POST["price_paid_input"];
    $book_price = $_POST["book_price_input"];

	// Insertion
	$sql="INSERT INTO used_vehicle (vin, current_kilometers, bought_from, purchase_location, price_paid, book_price)
	VALUES
	($VIN, $current_kms, $bought_from, $purchase_location, $price_paid, $book_price)";

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