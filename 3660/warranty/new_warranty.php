<html>
	<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Dealership";

	// Variables for inserting into Customer table
	$policy_no = $_POST["policy_number"];
	$co_signer = $_POST["co_signer"];
	$length = (int)$_POST["warranty_length"];
	$start_date = $_POST["start_date"];
	$deductible = (int)$_POST["deductible"];
	$price = (int)$_POST["price"];

	// Insertion into Employee
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Warranty (policy_number , co_signer , warranty_length  , _start_date, deductible, price)
	VALUES(\"$policy_no\", \"$co_signer\",  \"$length\", \"$start_date\", \"$deductible\", \"$price\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
		echo "Warranty inserted successfully.<br>";
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}	
	mysqli_close($con);
	?>

	</body>
</html>