<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dealership";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*find all warranties that each customer has, 
report the policy number and the customer name */ 
$sql = "SELECT customer.first_name,customer.last_name, warranty.policy_number
from customer,sale_customer, sale,sale_vehicle, vehicle,vehicle_warranty,warranty
where customer.cid = sale_customer.cid AND
    sale_customer.sid = sale.sid AND
    sale.sid = sale_vehicle.sid AND
    sale_vehicle.vin = vehicle.vin AND
    vehicle.vin = vehicle_warranty.vin AND
    vehicle_warranty.policy_number = warranty.policy_number
;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {      
    echo "<table><tr><th>Policy ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["policy_number"]."</td><td>".$row["first_name"]." ".$row["last_name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>
<html>
<head>
	<title>Database</title>
</head>
<body bgcolor="#C0C0C0">
	<a href="index.php"><button>Home</button></a>
</body>
</html>
<?php
?>