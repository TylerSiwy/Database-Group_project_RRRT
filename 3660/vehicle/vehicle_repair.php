<html>
	<body>
	<?php
	include '../credentials.php';
	$servername = getServerName();
	$username = getUserName();
	$password = getPassword();
	$dbname = getdbName();

	// Variables for inserting into Customer table
	$VIN = $_POST["vin_input"];
	$purchase_date = $_POST["purchase_input"];
	$problem = $_POST["problem_input"];
	$estimate = (int)$_POST["estimate_input"];
	$actual_cost = (int)$_POST["actual_cost_input"];

	/////////////////////////   
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
         die("Connection failed: " . $con->connect_error);
    }
    $temp = "000";
    $sql= "SELECT purchase_date, vin, repair_number FROM Repairs ORDER BY repair_number asc";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    while($row){
       $array = explode('-', $row["repair_number"]);
       if($temp == $array[1] && $VIN == $row["vin"] && $purchase_date == $row["purchase_date"]){
          ++$temp;
       }
       $row = $result->fetch_assoc();
    }
    if(strlen($temp)==1){
        $EID = "R-00".$temp;
    }
    else if(strlen($temp)==2){
        $EID = "R-0".$temp;
    }
    else{
        $EID = "R-".$temp;}
        $repair_number = $EID;
    /////////////////////////////////// 

	// Insertion into Employee
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Repairs (vin, purchase_date, repair_number, problem, cost_estimate , cost_actual)
	VALUES(\"$VIN\", \"$purchase_date\", \"$repair_number\",  \"$problem\", \"$estimate\", \"$actual_cost\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
		echo "Repair inserted successfully.<br>";
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}	
	mysqli_close($con);
	?>

	</body>
</html>