<html>
	<body>
	<?php
	include '../credentials.php';
	$servername = getServerName();
	$username = getUserName();
	$password = getPassword();
	$dbname = getdbName();

	// Variables for inserting into Customer table
	$EID = $_POST["eid_input"];
	$first = $_POST["first_input"];
    $last = $_POST["last_input"];
	$phone_number = $_POST["phone_input"];
        
        // R CHANGES
        $con = new mysqli($servername, $username, $password, $dbname);
        if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
        $temp = "000";
        $zero_start = 0;
       $sql= "SELECT eid FROM Employee ORDER BY eid asc";
           $result = $con->query($sql);
      //  $num_employees = $result->fetch_assoc();
        //  echo $num_employees["num_E"]." ";
       // for($i=0;i<$row; i++){
          // if ($result->num_rows > 0) 
	       //   {
              $row = $result->fetch_assoc();
               while($row) 
               {
                   
                 //  echo $row["eid"]." ";
                   $array = explode('-', $row["eid"]);
               //   echo $array[1]."ECHO SPLIT 1 ";
                   if($temp == $array[1]){
                      ++$temp;
                   }
                   $row = $result->fetch_assoc();
               }
           //}
        if(strlen($temp)==1){
            //echo "00".$temp;
            $EID = "E-00".$temp;
        }else if(strlen($temp)==2){
       // echo  $temp."TEMPP";
        $EID = "E-0".$temp;
        }
        
        else{$EID = "E-".$temp;}
       // $EID = "E-".$temp;
      //  $EID = "E-".$row;
//echo $result;

       // $EID = "@";
     //   $str = $EID;
       // echo explode('-', $str,1)."<br>";
       // print_r(explode('-', $str,2));
     //   $array = explode('-', $str,2);
     //   $EID = $array[1];
     //   echo $EID."<br>";
    //    $EID = ++$EID;
    //    echo $EID."<br>";
        // R CHANGES
        
        
        
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