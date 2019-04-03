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
	$sql = "SELECT S.eid, S.last_name, S.first_name, sale_commissions + warranty_commisions as total_commissions
    FROM
        (SELECT Employee.eid, last_name, first_name, sum(commission) as sale_commissions
        FROM Employee, Sale_Employee, Sale
        WHERE Employee.eid = Sale_Employee.eid AND Sale_Employee._sid = Sale._sid
        GROUP BY Employee.eid
        UNION
        SELECT Employee.eid, last_name, first_name, 0
        FROM Employee
        WHERE NOT EXISTS
            (SELECT eid FROM Sale_Employee WHERE Employee.eid = Sale_Employee.eid)) as S,
    
        (SELECT Employee.eid, last_name, first_name, sum(price * 0.25) as warranty_commisions
        FROM Employee, Sale_Employee, Vehicle_Warranty, Warranty
        WHERE Employee.eid = Sale_Employee.eid AND Sale_Employee._sid = Vehicle_Warranty._sid AND Vehicle_Warranty.pid = Warranty.pid
        GROUP BY Employee.eid
        UNION
        SELECT Employee.eid, last_name, first_name, 0
        FROM Employee
        WHERE NOT EXISTS
            (SELECT eid FROM Sale_Employee, Vehicle_Warranty WHERE Employee.eid = Sale_Employee.eid AND Sale_Employee._sid = Vehicle_Warranty._sid)) as W
    WHERE S.eid = W.eid
    ORDER BY total_commissions desc;";

	$result = $con->query($sql);


	// Output the results in a table format
	if ($result->num_rows > 0) 
	{ 
		echo "<div class='four_wide_container'>";
		echo "<div class='item'>";
		echo "Employee ID";
		echo "</div>";
		echo "<div class='item'>";
		echo "Last Name";
		echo "</div>";
		echo "<div class='item'>";
		echo "First Name";
        echo "</div>";
        echo "<div class='item'>";
		echo "Commissions";
		echo "</div>";
		echo "</div></br>";

		echo "<div class='four_wide_container'>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class='item'>";
			echo $row["eid"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["last_name"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["first_name"]." ";
            echo "</div>";
            
            echo "<div class='item'>";
			echo round($row["total_commissions"]." ", 2);
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