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
	$sql = "SELECT SUB.first_name, SUB.last_name, SUB.phone_number, count(Num_Late) as n
	FROM 
		(SELECT Payments._sid, count(payment_number) AS Num_Late, Sale_Customer.first_name, Sale_Customer.last_name, Sale_Customer.phone_number
		 FROM Payments, Sale_Customer
		 WHERE due_date < paid_date AND Payments._sid = Sale_Customer._sid
		 GROUP BY _sid) AS SUB
	GROUP BY  SUB.first_name, SUB.last_name, SUB.phone_number;";

	$result = $con->query($sql);


	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='four_wide_container'>";
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
		echo "Number Of Late Payments";
        echo "</div></br>";
        echo "</div>";

		echo "<div class='four_wide_container'>";
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
			echo $row["n"]." ";
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