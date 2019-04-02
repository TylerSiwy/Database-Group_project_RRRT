
<?php
include 'database_initial_setup.php';

?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <title>Database</title>
    <link rel = "stylesheet" type = "text/css" href = "stylesheet.css"/>
</head>

<body>
    <ul class="top-level-menu">
        <li><a href="index.php">Home</a></li>

        <li><a href="#">Sell A Vehicle</a>
        <ul class="second-level-menu">
            <li><a href="sales/Vehicle_Sale_New_Customer.html">New Customer</a></li>
            <li><a href="sales/Vehicle_Sale_Old_Customer.html">Existing Customer</a></li>
        </ul>

        <li><a href="#">Buy A Vehicle</a>
        <ul class="second-level-menu">
            <li><a href="vehicle/New_Vehicle.html">New Vehicle</a></li>
            <li><a href="vehicle/Used_Vehicle.html">Used Vehicle</a></li>
        </ul>    

        <li><a href="vehicle/Vehicle_Repair.html">Add A Repair Ticket</a></li>
        <li><a href="warranty/New_Warranty.html">Add A Warranty</a></li>
        
        <li><a href="#">Customer</a>
        <ul class="second-level-menu">
            <li><a href="customer/New_Customer.html">New Customer</a></li>
            <li><a href="customer/View_Customer.html">View A Customer</a></li>
            <li><a href="customer/Update_Customer.html">Update</a></li>
            <li><a href="customer/Delete_Customer.html">Delete</a></li>
        </ul>

        <li><a href="#">Employee</a>
        <ul class="second-level-menu">
            <li><a href="employee/View_Employee.html">View Employee</a></li>
            <li><a href="employee/New_Employee.html">New Employee</a></li>
        </ul>
    </ul>

    <br><br><br>
</body>

</html>
<?php
//Checks for, then creates database, tables, and populates with data
database_setup(); 
?>
   <a href="/3660/customer/Customer.html"><button class="button"> Customer (Not Used)</button></a>
	<a href="/3660/vehicle/New_Vehicle.html"><button class="button">Add Vehicle (Not Used)</button></a>
	<a href="test_query.php"><button class="button">Test Query 1 (Not Used)</button></a>