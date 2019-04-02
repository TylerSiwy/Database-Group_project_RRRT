<html>
	<body>
	<?php
	
	function vehicleInsertion($VIN, $Year, $Model, $Edition, 
	$Colour_Interior, $Colour_Exterior, $Purchase_Date){
		$servername = getServerName();
		$username = getUserName();
		$password = getPassword();
		$dbname = getdbName();
		$con = new mysqli($servername, $username, $password, $dbname);

		if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
		}

		// Insertion
		$sql = "INSERT INTO Vehicle (vin, _year, model, _edition, interior_color, exterior_color, purchase_date)
		VALUES
		(\"$VIN\", \"$Year\", \"$Model\", \"$Edition\", \"$Colour_Interior\", \"$Colour_Exterior\", \"$Purchase_Date\")";
		// Check if it worked correctly
		if(mysqli_query($con, $sql)){
		echo "Records inserted successfully.";
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}
		exit;

		$result = mysqli_query($con, $sql) or trigger_error(mysqli_error($con));	
		mysqli_close($con);
		
}
?>
	</body>
</html>