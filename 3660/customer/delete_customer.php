<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "../stylesheet.css"/>
</head>

<body>
	<a href="../../index.php"><button>Back</button></a>
	<br><br><br>

<?php
include '../credentials.php';


// Getting information
$first_name = $_POST["first_name_input"];
$last_name = $_POST["last_name_input"];
$phone_number = $_POST["phone_input"];

$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();
$sql = "DELETE FROM customer
WHERE `customer`.`first_name` = '$first_name' 
AND `customer`.`last_name` = '$last_name' 
AND `customer`.`phone_number` = '$phone_number';";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
$result = $con->query($sql);
mysqli_close($con);

?>
</body>
</html>