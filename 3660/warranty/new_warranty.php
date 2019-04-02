<html>
	<body>
	<?php
	include '../credentials.php';
	$servername = getServerName();
	$username = getUserName();
	$password = getPassword();
	$dbname = getdbName();

	// Variables for inserting into warranty table
	$VIN = $_POST["vin_input"];
	$policy_no = $_POST["policy_number"];
	$co_signer = $_POST["co_signer"];
	$length = (int)$_POST["warranty_length"];
	$start_date = $_POST["start_date"];
	$deductible = (int)$_POST["deductible"];
	$price = (int)$_POST["price"];
	$sid = $_POST["sale_id"];

	// Insertion into warranty
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Warranty (pid , warranty_length)
	VALUES(\"$policy_no\", $length )";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
		echo "Warranty inserted successfully.<br>";
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}	
	mysqli_close($con);

	// Insertion into vehicle warranty
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Vehicle_Warranty (pid, _sid, deductible, price, co_signer)
	VALUES(\"$policy_no\", \"$sid\", $deductible, $price, \"$co_signer\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
		echo "Vehicle_Warranty inserted successfully.<br>";
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}	
	mysqli_close($con);
	?>

	</body>
</html>