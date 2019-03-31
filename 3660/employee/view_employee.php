<html>
	<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Dealership";

	// Variables for inserting into Customer table
	$EID = $_POST["eid_input"];

	// Insertion into Employee
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "SELECT *
	FROM Employee
	WHERE eid = '$EID'";

	$result = $con->query($sql);

	// if ($result->num_rows > 0) {      
	// 	echo "<table><tr><th>Employee Name</th><th>Phone Number</th></tr>";
	// 	// output data of each row
	// 	while($row = $result->fetch_assoc()) {
	// 		echo "</td><td>".$row["first_name"]." ".$row["last_name"]."</td></tr>"."<tr><td>".$row["phone_number"];
	// 	}
	// 	echo "</table>";
	// } else {
	// 	echo "0 results";
	// }

	if ($result->num_rows > 0) {      
		echo "<div>Employee Name, Phone Number</div>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<div class='item'>".$row["first_name"]." ".$row["last_name"]." ".$row["phone_number"]."</div>";
		}
	} else {
		echo "0 results";
	}

	mysqli_close($con);

	?>

	</body>
</html>