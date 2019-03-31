<?php
include "../credentials.php";
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

//For Sale
$VIN = $_POST['vin_input'];
$SID = $_POST['sid_input'];
$EID = $_POST['eid_input'];
$commission = (int)$_POST['commission_input'];
$sale_date = $_POST['sale_date_input'];
$downpayment = (int)$_POST['downpayment_input'];
$sale_price = (int)$_POST['sale_price_input'];
$interest_rate = (int)$_POST['i_rate_input'];

//For Customer
$first = $_POST["first_input"];
$last = $_POST["last_input"];
$dob = $_POST["dob_input"];
$gender = $_POST["gender_input"];
$street = (int)$_POST["street_input"];
$province = $_POST["province_input"];
$city = $_POST["city_input"];
$postal_code = $_POST["postal_input"];
$phone_number = $_POST["phone_input"];

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO customer (first_name, last_name, dob, gender, street, province, city, postal_code, phone_number) 
VALUES 
('$first', '$last', '$dob', '$gender', '$street', '$province', '$city', '$postal_code', '$phone_number')";

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Customer inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);


//Insert new sale
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO Sale (_sid, intrest_rate, sale_price, downpayment, commission, sale_date) 
VALUES 
(\"$SID\", \"$interest_rate\", \"$sale_price\", \"$downpayment\", \"$commission\", \"$sale_date\")";

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Sale inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);


//Insert into Sale_Employee 
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO Sale_Employee (eid, _sid) 
VALUES 
(\"$EID\", \"$SID\")";

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Sale_employee inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);


//Insert into Sale_Vehicle 
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO Sale_Vehicle (vin, _sid) 
VALUES 
(\"$VIN\", \"$SID\")";

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Sale_vehicle inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);
?>