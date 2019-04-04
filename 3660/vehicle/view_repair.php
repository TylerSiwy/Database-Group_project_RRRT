<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "../stylesheet.css"/>
</head>

<body>
	<a href="View_Repairs.html"><button>Back</button></a>
	<br><br><br>
	
	<?php
	include '../credentials.php';
	$servername = getServerName();
	$username = getUserName();
	$password = getPassword();
	$dbname = getdbName();

	// Variables for inserting into Customer table
	$VIN = $_POST["input"];

	// Insertion into Employee
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
	}
	$sql = "SELECT *
	FROM Repairs
	WHERE vin = '$VIN'";

	$result = $con->query($sql);

	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='repair_container'>";
		echo "<div class='item'>";
		echo "VIN";
		echo "</div>";
		echo "<div class='item'>";
		echo "Problem";
		echo "</div>";
		echo "<div class='item'>";
		echo "Cost Estimate";
		echo "</div>";
		echo "<div class='item'>";
		echo "Cost Actual";
		echo "</div>";
		echo "</div></br>";

		echo "<div class='repair_container'>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class='item'>";
			echo $row["vin"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["problem"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["cost_estimate"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["cost_actual"]." ";
			echo "</div>";
		}
		echo "</div>";
	} else 
	{
		echo "0 results";
	}

	mysqli_close($con);

	?>

</body>

</html>