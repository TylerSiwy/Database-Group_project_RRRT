<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "../stylesheet.css"/>
</head>

<body>
	<a href="../index.php"><button>Back</button></a>
	<br><br><br>
	
	<?php
	include '../credentials.php';
	$servername = getServerName();
	$username = getUserName();
	$password = getPassword();
	$dbname = getdbName();

	// Insertion into Employee
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
	}
	$sql = "SELECT customer.first_name,customer.last_name, warranty.policy_number
	FROM customer,sale_customer, sale,sale_vehicle, vehicle,vehicle_warranty,warranty
	WHERE customer.cid = sale_customer.cid AND
		  sale_customer._sid = sale._sid AND
		  sale._sid = sale_vehicle._sid AND
		  sale_vehicle.vin = vehicle.vin AND
		  vehicle.vin = vehicle_warranty.vin AND
		  vehicle_warranty.policy_number = warranty.policy_number;";
	
	if ($result = $con->query($sql)) {
		// $result is an object and can be used to fetch row here
	}
	else {
		printf("Query failed: %s\n", $con->error);
	}
	
	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='three_wide_container'>";
		echo "<div class='item'>";
		echo "First Name";
        echo "</div>";
        
		echo "<div class='item'>";
		echo "Last Name";
        echo "</div>";

        echo "<div class='item'>";
		echo "Policy Number";
        echo "</div>";
        echo "</div>";

		echo "<div class='three_wide_container'>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class='item'>";
			echo $row["first_name"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["last_name"]." ";
            echo "</div>";
            
            echo "<div class='item'>";
			echo $row["policy_number"]." ";
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