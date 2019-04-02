<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "../stylesheet.css"/>
</head>

<body>
	<a href="View_Employee.html"><button>Back</button></a>
	<br><br><br>

<?php
include '../credentials.php';


// Getting information
$first_name = $_POST["first_name_input"];
$last_name = $_POST["last_name_input"];
$phone_number = $_POST["phone_input"];

$first = $_POST["first_input"];
$last = $_POST["last_input"];
$dob = $_POST["dob_input"];
$gender = $_POST["gender_input"];
$street = (int)$_POST["street_input"];
$province = $_POST["province_input"];
$city = $_POST["city_input"];
$postal_code = $_POST["postal_input"];
$new_phone_number = $_POST["phone_number_input"];

if($dob!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `dob` = '$dob'
    WHERE `customer`.`first_name` = '$first_name' 
    AND `customer`.`last_name` = '$last_name' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}

if($gender!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `gender` = '$gender'
    WHERE `customer`.`first_name` = '$first_name' 
    AND `customer`.`last_name` = '$last_name' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}

if($street!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `street` = '$street'
    WHERE `customer`.`first_name` = '$first_name' 
    AND `customer`.`last_name` = '$last_name' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}

if($city!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `city` = '$city'
    WHERE `customer`.`first_name` = '$first_name' 
    AND `customer`.`last_name` = '$last_name' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}

if($province!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `province` = '$province'
    WHERE `customer`.`first_name` = '$first_name' 
    AND `customer`.`last_name` = '$last_name' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}

if($postal_code!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `postal_code` = '$postal_code'
    WHERE `customer`.`first_name` = '$first_name' 
    AND `customer`.`last_name` = '$last_name' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}

if($first!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `first_name` = '$first'
    WHERE `customer`.`first_name` = '$first_name' 
    AND `customer`.`last_name` = '$last_name' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}

if($last!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `last_name` = '$last'
    WHERE `customer`.`first_name` = '$first' 
    AND `customer`.`last_name` = '$last_name' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}

if($new_phone_number!=""){
    $servername = getServerName();
    $username = getUserName();
    $password = getPassword();
    $dbname = getdbName();
    $sql = "UPDATE `customer` SET `phone_number` = '$new_phone_number'
    WHERE `customer`.`first_name` = '$first' 
    AND `customer`.`last_name` = '$last' 
    AND `customer`.`phone_number` = '$phone_number';";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query($sql);
    mysqli_close($con);
}
?>
</body>
</html>