<html>
	<body>
	<?php
	include '../credentials.php';
	$servername = getServerName();
	$username = getUserName();
	$password = getPassword();
	$dbname = getdbName();

	// Variables for inserting into Customer table
	$VIN = $_POST["vin_input"];
	$problem = $_POST["problem_input"];
	$estimate = (int)$_POST["estimate_input"];
	$actual_cost = (int)$_POST["actual_cost_input"];

	// Insertion into Employee
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Repairs (vin, problem, cost_estimate , cost_actual)
	VALUES(\"$VIN\", \"$problem\", \"$estimate\", \"$actual_cost\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
		echo "Repair inserted successfully.<br>";
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}	
	mysqli_close($con);
	?>

	</body>
</html>