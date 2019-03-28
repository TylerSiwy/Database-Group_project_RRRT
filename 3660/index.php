<?php
include 'database_initial_setup.php';
include 'test_query.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dealership";

//Checks for, then creates database, tables, and populates with data
database_setup(); 

?>
<html>
<head>
	<title>Database</title>
</head>
<body bgcolor="#666666">

	<a href="index.php"><button>Home</button></a>
	<a href="/3660/customer/Customer.html"><button>Customer</button></a>
	<a href="/3660/sales/Vehicle_Sale.html"><button>Vehicle_Sale</button></a>
	<a href="/3660/warranty/Vehicle_Warranty.html"><button>Vehicle_Warranty</button></a>
	<a href="/3660/vehicle/New_Vehicle.html"><button>Add Vehicle</button></a>
	<a href="test_query.php"><button>Test Query 1</button></a>

</body>
</html>
<?php
?>