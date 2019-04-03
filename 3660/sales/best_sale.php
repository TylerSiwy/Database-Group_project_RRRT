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
	
	$sql = "SELECT Employee.eid, first_name, last_name, sale_price, sale_date, _year, 'Toyota', model, _edition, sale._sid
    FROM Sale, Sale_Employee, Employee, Sale_Vehicle, Vehicle
    WHERE Sale_Employee._sid = Sale._sid 
    AND Employee.eid = Sale_Employee.eid AND Sale._sid = Sale_Vehicle._sid 
    AND Vehicle.vin = Sale_Vehicle.vin AND Vehicle.purchase_date = Sale_Vehicle.purchase_date 
    AND sale_price = (SELECT max(sale_price) FROM Sale);";

	$result = $con->query($sql);


	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='ten_wide_container'>";
			echo "<div class='item'>";
				echo "Employee ID";
			echo "</div>";

			echo "<div class='item'>";
				echo "C Last Name";
			echo "</div>";
			
			echo "<div class='item'>";
				echo "C First Name";
			echo "</div>";
            
            echo "<div class='item'>";
				echo "Vehicle Make";
            echo "</div>";
            
			echo "<div class='item'>";
				echo "Vehicle Year";
			echo "</div>";
			
			echo "<div class='item'>";
				echo "Vehicle Model";
			echo "</div>";
			
			echo "<div class='item'>";
				echo "Edition";
			echo "</div>";
			
			echo "<div class='item'>";
				echo "Sale Price";
			echo "</div>";
			
			echo "<div class='item'>";
				echo "Sale Date";
			echo "</div>";

			echo "<div class='item'>";
				echo "Sale ID";
			echo "</div></br>";	
		echo "</div>";
		echo "<div class='ten_wide_container'>";
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
					echo $row["first_name"]." ";
				echo "</div>";

                echo "<div class='item'>";
					echo "Toyota"." ";
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
					echo $row["sale_price"]." ";
				echo "</div>";

				echo "<div class='item'>";
					echo $row["sale_date"]." ";
				echo "</div>";

				echo "<div class='item'>";
					echo $row["_sid"]." ";
				echo "</div>";
			}
		echo "</div>";
	} else {
		echo "0 results";
	}

	mysqli_close($con);

	?>

</body>

</html>