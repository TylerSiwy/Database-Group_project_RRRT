<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "../stylesheet.css"/>
</head>

<body>
	<a href="View_Employee.html"><button>Back</button></a>
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
	FROM Employee";

	$result = $con->query($sql);

	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='employee_container'>";
		echo "<div class='item'>";
		echo "First Name";
		echo "</div>";
		echo "<div class='item'>";
		echo "Last Name";
		echo "</div>";
		echo "<div class='item'>";
		echo "Phone Number";
		echo "</div>";
		echo "</div></br>";

		echo "<div class='employee_container'>";
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