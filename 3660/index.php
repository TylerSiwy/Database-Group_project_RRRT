
<?php
include 'database_initial_setup.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dealership";

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.third-level-menu
{
    position: absolute;
    top: 0;
    right: -150px;
    width: 150px;
    list-style: none;
    padding: 0;
    margin: 0;
    display: none;
}

.third-level-menu > li
{
    height: 30px;
    background: #999999;
}
.third-level-menu > li:hover { background: #CCCCCC; }

.second-level-menu
{
    position: absolute;
    top: 30px;
    left: 0;
    width: 150px;
    list-style: none;
    padding: 0;
    margin: 0;
    display: none;
}

.second-level-menu > li
{
    position: relative;
    height: 30px;
    background: #999999;
}
.second-level-menu > li:hover { background: #CCCCCC; }

.top-level-menu
{
    list-style: none;
    padding: 0;
    margin: 0;
}

.top-level-menu > li
{
    position: relative;
    float: left;
    height: 30px;
    width: 150px;
    background: #999999;
}
.top-level-menu > li:hover { background: #CCCCCC; }

.top-level-menu li:hover > ul
{
    /* On hover, display the next level's menu */
    display: inline;
}


/* Menu Link Styles */

.top-level-menu a /* Apply to all links inside the multi-level menu */
{
    font: bold 14px Arial, Helvetica, sans-serif;
    color: #FFFFFF;
    text-decoration: none;
    padding: 0 0 0 10px;

    /* Make the link cover the entire list item-container */
    display: block;
    line-height: 30px;
}
.top-level-menu a:hover { color: #000000; }
</style>
</head>
<head>
	<title>Database</title>
</head>
<body bgcolor="#C0C0C0">

<ul class="top-level-menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="customer/New_Customer.html">New Customer</a></li>
    <li>
	<a href="#">Sell A Vehicle</a>
	<ul class="second-level-menu">
		<li><a href="sales/Vehicle_Sale_New_Customer.html">New Customer</a></li>
        <li><a href="#">Existing Customer</a></li>
	</ul>
    <li><a href="#">Buy A Vehicle</a>
	<ul class="second-level-menu">
		<li><a href="vehicle/New_Vehicle.html">New Vehicle</a></li>
		<li><a href="vehicle/Used_Vehicle.html">Used Vehicle</a></li>
    </ul>
    <li><a href="#">Employee</a>
	<ul class="second-level-menu">
		<li><a href="employee/View_Employee.html">View Employee</a></li>
		<li><a href="employee/New_Employee.html">New Employee</a></li>
    </ul>
    <li><a href="vehicle/Vehicle_Repair.html">Add A Repair Ticket</a></li>
    <li><a href="warranty/New_Warranty.html">Add A Warranty</a></li>
</ul>


</body>
<br><br><br>
</html>
<?php
//Checks for, then creates database, tables, and populates with data
database_setup(); 
?>
   <a href="/3660/customer/Customer.html"><button class="button"> Customer (Not Used)</button></a>
	<a href="/3660/vehicle/New_Vehicle.html"><button class="button">Add Vehicle (Not Used)</button></a>
	<a href="test_query.php"><button class="button">Test Query 1 (Not Used)</button></a>