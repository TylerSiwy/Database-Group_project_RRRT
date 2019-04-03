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
	
	$sql = "SELECT 
	Customer.first_name, Customer.last_name, Customer.phone_number, Vehicle._year,
	Vehicle.model, Vehicle._edition, sale_price, sale_date, sale._sid
    FROM Customer, Sale_Customer, Sale_Vehicle, Vehicle, Sale
    WHERE Customer.first_name = Sale_Customer.first_name 
    AND Customer.last_name = Sale_Customer.last_name
    AND Customer.phone_number = Sale_Customer.phone_number 
    AND Sale_Customer._sid = Sale_Vehicle._sid 
    AND Sale_Vehicle.vin = Vehicle.vin
    AND Sale._sid = Sale_Vehicle._sid;";

	$result = $con->query($sql);


	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='nine_wide_container'>";
			echo "<div class='item'>";
				echo "First Name";
			echo "</div>";

			echo "<div class='item'>";
				echo "Last Name";
			echo "</div>";
			
			echo "<div class='item'>";
				echo "Phone Number";
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
		echo "<div class='nine_wide_container'>";
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
					echo $row["phone_number"]." ";
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