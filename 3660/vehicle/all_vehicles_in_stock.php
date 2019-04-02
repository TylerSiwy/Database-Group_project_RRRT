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
	$sql = "SELECT *
    FROM
        (SELECT Sale._sid, sale_date, _year, model, _edition, (sale_price - price_paid - sum(cost_actual)) AS net_profit
        FROM Used_Vehicle, Vehicle, Sale_Vehicle, Repairs, Sale
        WHERE Sale_Vehicle.vin = Vehicle.vin AND Vehicle.vin = Used_Vehicle.vin AND Sale_Vehicle.purchase_date = Vehicle.purchase_date AND Vehicle.vin = Used_Vehicle.vin AND Repairs.vin = Used_Vehicle.vin AND Used_Vehicle.purchase_date = Vehicle.purchase_date AND Sale_Vehicle._sid = Sale._sid
        group by Sale._sid
        UNION
        SELECT Sale._sid, sale_date, _year, model, _edition, (sale_price - price_paid) AS net_profit
        FROM
            (SELECT *
            FROM Used_Vehicle
            WHERE NOT EXISTS
                (SELECT * FROM Repairs WHERE Repairs.vin = Used_Vehicle.vin)) AS No_Repair, Vehicle, Sale_Vehicle, Sale
        WHERE Sale_Vehicle.vin = Vehicle.vin AND Vehicle.vin = No_Repair.vin AND Sale_Vehicle._sid = Sale._sid) AS Used_Sales
    UNION
    SELECT Sale._sid, sale_date, _year, model, _edition, (sale_price - msrp)AS net_profit
    FROM New_Vehicle, Vehicle, Sale_Vehicle, Sale
    WHERE New_Vehicle.vin = Vehicle.vin AND Sale_Vehicle.vin = Vehicle.vin AND Sale_Vehicle._sid = Sale._sid;";

	$result = $con->query($sql);


	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='profits_container'>";
		echo "<div class='item'>";
		echo "Sale ID";
        echo "</div>";
        
		echo "<div class='item'>";
		echo "Sale Date";
        echo "</div>";

        echo "<div class='item'>";
		echo "Vehicle Year";
        echo "</div>";

		echo "<div class='item'>";
		echo "Model";
        echo "</div>";

        echo "<div class='item'>";
		echo "Edition";
        echo "</div>";

        echo "<div class='item'>";
		echo "Net Profit";
        echo "</div></br>";
        echo "</div>";

		echo "<div class='profits_container'>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class='item'>";
			echo $row["_sid"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["sale_date"]." ";
            echo "</div>";
            
            echo "<div class='item'>";
			echo $row["_year"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["model"]." ";
            echo "</div>";
            
            echo "<div class='item'>";
			echo $row["_edition"]." ";
            echo "</div>";

            echo "<div class='item'>";
			echo $row["net_profit"]." ";
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