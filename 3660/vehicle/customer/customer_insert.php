<html>
	<body>
	<?php
	include '../credentials.php';
	$servername = getServerName();
	$username = getUserName();
	$password = getPassword();
	$dbname = getdbName();

	// Variables for inserting into Customer table
	$first = $_POST["first_input"];
    $last = $_POST["last_input"];
    $dob = $_POST["dob_input"];
    $gender = $_POST["gender_input"];
    $street = (int)$_POST["street_input"];
    $province = $_POST["province_input"];
    $city = $_POST["city_input"];
    $postal_code = $_POST["postal_input"];
	$phone_number = $_POST["phone_input"];
	
	//Variables for inserting into employment history table
	$start_date = $_POST["start_date_input"];
	$job_title = $_POST["job_title_input"];
	$supervisor = $_POST["supervisor_input"];
	$company_name = $_POST["company_name_input"];
	$company_number = (int)$_POST["company_number_input"];
	$company_street = (int)$_POST["company_street_input"];
	$company_province = $_POST["company_province_input"];
	$company_city = $_POST["company_city_input"];
	$company_postal_code = $_POST["company_postal_code_input"];
/*
	// Insertion into customer 
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO customer (first_name, last_name, dob, gender, street, province, city, postal_code, phone_number)
	VALUES (\"$first\", \"$last\", \"$dob\", \"$gender\", \"$street\", \"$province\", \"$city\", \"$postal_code\", \"$phone_number\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}

	$result = mysqli_query($con, $sql) or trigger_error(mysqli_error($con));	
	mysqli_close($con);
*/
	//Insertion into employment history
	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	$sql = "INSERT INTO Employment_History (first_name, last_name, phone_number, _start_date, job_title , 
	supervisor, company_name, company_phone_number, street, province, city, postal_code) 
	VALUES (\"$first\", \"$last\", \"$phone_number\", \"$start_date\", \"$job_title\", \"$supervisor\", 
	\"$company_name\", \"$company_number\", \"$company_street\", \"$company_province\", \"$company_city\",
	 \"$company_postal_code\")";

	// Check if it worked correctly
	if(mysqli_query($con, $sql)){
    echo "Customer inserted successfully.";
	} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
	exit;

	$result = mysqli_query($con, $sql) or trigger_error(mysqli_error($con));	
	mysqli_close($con);
	?>

	</body>
</html>