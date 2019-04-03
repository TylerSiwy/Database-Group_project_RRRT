<html>
	<body>
	<?php
	include '../credentials.php';
	$servername = getServerName();
	$username = getUserName();
	$password = getPassword();
	$dbname = getdbName();

	// Variables for inserting into Customer table
	//$EID = $_POST["eid_input"];
	$first = $_POST["first_input"];
    $last = $_POST["last_input"];
	$phone_number = $_POST["phone_input"];
        
        $con = new mysqli($servername, $username, $password, $dbname);
        if ($con->connect_error) {
             die("Connection failed: " . $con->connect_error);
        }
        $temp = "000";
        $sql= "SELECT eid FROM Employee ORDER BY eid asc";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        while($row){
           $array = explode('-', $row["eid"]);
           if($temp == $array[1]){
              ++$temp;
           }
           $row = $result->fetch_assoc();
        }
        if(strlen($temp)==1){
            $EID = "E-00".$temp;
        }
        else if(strlen($temp)==2){
            $EID = "E-0".$temp;
        }
        else{
            $EID = "E-".$temp;}
           
        
	// Insertion into Employee
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Employee (eid, first_name, last_name, phone_number)
	VALUES (\"$EID\", \"$first\", \"$last\",  \"$phone_number\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}


	mysqli_close($con);

	?>

	</body>
</html>