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

	$sql = "SELECT first_name, last_name, phone_number, sum(balance)
FROM
    (SELECT Sale._sid, (sale_price * 1.05) - sum(amount) - downpayment as balance
    FROM Sale, Payments
    WHERE Sale._sid = Payments._sid
    GROUP BY Sale._sid
    UNION
    SELECT Sale._sid, (sale_price * 1.05) - downpayment as balance
    FROM Sale
    WHERE NOT EXISTS
        (SELECT _sid FROM Payments WHERE Payments._sid = Sale._sid)) as Owed natural join Vehicle natural join Sale_Vehicle natural join Sale_Customer natural join Customer
GROUP BY first_name, last_name, phone_number";

	$result = $con->query($sql);


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