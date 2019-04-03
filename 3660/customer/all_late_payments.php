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
    (SELECT DAY(paid_date) AS DATE
    FROM Payments) AS D
    WHERE
     D.DATE>= 11;";

	$result = $con->query($sql);


	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='six_wide_container'>";
		echo "<div class='item'>";
		echo "Sale ID";
        echo "</div>";
        
		echo "<div class='item'>";
		echo "Payment Number";
        echo "</div>";

		echo "<div class='item'>";
		echo "Due Date";
		echo "</div>";
		
        echo "<div class='item'>";
		echo "Date Paid";
        echo "</div>";	

        echo "<div class='item'>";
		echo "Amount";
        echo "</div>";

        echo "<div class='item'>";
		echo "Bank Account No";
        echo "</div></br>";
        echo "</div>";

		echo "<div class='six_wide_container'>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class='item'>";
			echo $row["_sid"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["payment_number"]." ";
            echo "</div>";
			
			echo "<div class='item'>";
			echo $row["due_date"]." ";
			echo "</div>";
			
            echo "<div class='item'>";
			echo $row["paid_date"]." ";
			echo "</div>";
   
            echo "<div class='item'>";
			echo $row["amount"]." ";
            echo "</div>";

            echo "<div class='item'>";
			echo $row["bank_account"]." ";
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