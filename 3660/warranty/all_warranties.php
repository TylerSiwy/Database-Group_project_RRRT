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
	$sql = "SELECT Customer.first_name, Customer.last_name, Customer.phone_number, Warranty.pid, Warranty.warranty_length, Sale_Warranty.price, Sale_Warranty.deductible
	FROM Customer,Sale_Customer,Sale_Warranty,Warranty
	WHERE Customer.phone_number = Sale_Customer.phone_number AND
		Customer.first_name = Sale_Customer.first_name AND
		Customer.last_name = Sale_Customer.last_name AND
		Sale_Customer._sid = Sale_Warranty._sid AND
		Sale_Warranty.pid = Warranty.pid 
	GROUP BY Customer.first_name,Customer.last_name, Customer.phone_number, Warranty.pid
;";
	
	if ($result = $con->query($sql)) {
		// $result is an object and can be used to fetch row here
	}
	else {
		printf("Query failed: %s\n", $con->error);
	}
	
	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='seven_wide_container'>";
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
		echo "Policy Number";
		echo "</div>";
		
		echo "<div class='item'>";
		echo "Warranty Length";
		echo "</div>";
		
		echo "<div class='item'>";
		echo "Warranty Price";
        echo "</div>";

        echo "<div class='item'>";
		echo "Deductible";
        echo "</div>";
        echo "</div>";

		echo "<div class='seven_wide_container'>";
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
			echo $row["pid"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["warranty_length"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["price"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["deductible"]." ";
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