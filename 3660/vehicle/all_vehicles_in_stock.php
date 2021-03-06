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
	$sql = "SELECT Vehicle.vin, _year, model, _edition, exterior_color, interior_color, 0 as current_km, 'New' as vehicle_condition, msrp * 0.9 as price_paid
	FROM New_Vehicle, Vehicle
	WHERE New_Vehicle.vin = Vehicle.vin AND New_Vehicle.purchase_date = Vehicle.purchase_date AND NOT EXISTS
		(SELECT vin, purchase_date FROM Sale_Vehicle WHERE Sale_Vehicle.vin = Vehicle.vin AND Sale_Vehicle.purchase_date = Vehicle.purchase_date)
	UNION
	SELECT Vehicle.vin, _year, model, _edition, exterior_color, interior_color, current_km, 'Used' as vehicle_condition, price_paid
	FROM Used_Vehicle, Vehicle
	WHERE Used_Vehicle.vin = Vehicle.vin AND Used_Vehicle.purchase_date = Vehicle.purchase_date AND NOT EXISTS
		(SELECT vin, purchase_date FROM Sale_Vehicle WHERE Sale_Vehicle.vin = Vehicle.vin AND Sale_Vehicle.purchase_date = Vehicle.purchase_date);";

	$result = $con->query($sql);


	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='nine_wide_container'>";
		echo "<div class='item'>";
		echo "VIN";
        echo "</div>";
	
		echo "<div class='item'>";
		echo "Year";
        echo "</div>";
        
		echo "<div class='item'>";
		echo "Model";
        echo "</div>";

        echo "<div class='item'>";
		echo "Edition";
        echo "</div>";

		echo "<div class='item'>";
		echo "Exterior Color";
        echo "</div>";

        echo "<div class='item'>";
		echo "Interior Color";
        echo "</div>";

        echo "<div class='item'>";
		echo "Current KMs";
		echo "</div>";
		
		echo "<div class='item'>";
		echo "Condition";
		echo "</div>";

		echo "<div class='item'>";
		echo "Price Paid";
		echo "</div></br>";
        echo "</div>";

		echo "<div class='nine_wide_container'>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class='item_small'>";
			echo $row["vin"]." ";
			echo "</div>";

			echo "<div class='item_small'>";
			echo $row["_year"]." ";
			echo "</div>";

			echo "<div class='item_small'>";
			echo $row["model"]." ";
            echo "</div>";
            
            echo "<div class='item_small'>";
			echo $row["_edition"]." ";
			echo "</div>";

			echo "<div class='item_small'>";
			echo $row["exterior_color"]." ";
            echo "</div>";
            
            echo "<div class='item_small'>";
			echo $row["interior_color"]." ";
            echo "</div>";

            echo "<div class='item_small'>";
			echo $row["current_km"]." ";
			echo "</div>";
			
			echo "<div class='item_small'>";
			echo $row["vehicle_condition"]." ";
			echo "</div>";

			echo "<div class='item_small'>";
			echo $row["price_paid"]." ";
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