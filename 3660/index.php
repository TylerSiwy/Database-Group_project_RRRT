<?php
include 'database_initial_setup.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dealership";

?>
<html>
<head>
	<title>Database</title>
</head>
<body bgcolor="#C0C0C0">

	<a href="index.php"><button>Home</button></a>
	<a href="/3660/customer/Customer.html"><button>Customer</button></a>
	<a href="/3660/sales/Vehicle_Sale.html"><button>Vehicle_Sale</button></a>
	<a href="/3660/warranty/Vehicle_Warranty.html"><button>Vehicle_Warranty</button></a>
	<a href="/3660/vehicle/New_Vehicle.html"><button>Add Vehicle</button></a>
	<a href="test_query.php"><button>Test Query 1</button></a>

</body>
<br><br><br>
</html>
<?php
//Checks for, then creates database, tables, and populates with data
database_setup(); 
?>