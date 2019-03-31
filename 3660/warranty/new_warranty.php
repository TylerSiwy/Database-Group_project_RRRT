<html>
	<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Dealership";

	// Variables for inserting into Customer table
	$VIN = $_POST["vin_input"];
	$policy_no = $_POST["policy_number"];
	$co_signer = $_POST["co_signer"];
	$length = (int)$_POST["warranty_length"];
	$start_date = $_POST["start_date"];
	$deductible = (int)$_POST["deductible"];
	$price = (int)$_POST["price"];

	// Insertion into warranty
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Warranty (policy_number , warranty_length, deductible, price)
	VALUES(\"$policy_no\", \"$length\", \"$deductible\", \"$price\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
		echo "Warranty inserted successfully.<br>";
		} else{
		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}	
	mysqli_close($con);

	// Insertion into vehicle warranty
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Vehicle_Warranty (policy_number, vin, co_signer)
	VALUES(\"$policy_no\", \"$VIN\", \"$co_signer\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
		echo "Vehicle_Warranty inserted successfully.<br>";
		} else{
		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}	
	mysqli_close($con);
	?>

	</body>
</html>