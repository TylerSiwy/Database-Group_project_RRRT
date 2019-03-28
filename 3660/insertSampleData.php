<html>
	<body>
	<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dealership";

	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	} 

	/*$sql="INSERT INTO vehicle (VIN, Year, Model)
	VALUES
	(123456790, 1992, 'Butts')";*/
	echo $vin_text;
	 

	$result = mysqli_query( $con,$sql) or trigger_error(mysqli_error($con));	
	mysqli_close($con);
	?>

	</body>
</html>