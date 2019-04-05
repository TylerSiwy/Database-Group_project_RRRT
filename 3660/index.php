
<?php
include 'database_initial_setup.php';
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <title>The BEST Toyota Database</title>
    <link rel = "stylesheet" type = "text/css" href = "stylesheet.css"/>
</head>

<body>
    <ul class="top-level-menu">
        <li><a href="index.php">Home</a></li>

        <li><a href="#">Sales</a>
        <ul class="second-level-menu">
            <li><a href="sales/Vehicle_Sale_New_Customer.html">Sell New Customer</a></li>
            <li><a href="sales/Vehicle_Sale_Old_Customer.html">Sell Old Customer</a></li>
            <li><a href="sales/all_sales.php">All Sales</a></li>
            <li><a href="sales/best_sale.php">Best Sale</a></li>
            <li><a href="sales/profits.php">Profits</a></li>
        </ul>

        <li><a href="#">Vehicles</a>
        <ul class="second-level-menu">
            <li><a href="vehicle/New_Vehicle.html">Buy New Vehicle</a></li>
            <li><a href="vehicle/Used_Vehicle.html">Buy Used Vehicle</a></li>
            <li><a href="vehicle/all_vehicles_in_stock.php">Vehicle Stocks</a></li>
        </ul>    

        <li><a href="#">Customers</a>
        <ul class="second-level-menu">
            <li><a href="customer/New_Customer.html">New Customer</a></li>
            <li><a href="customer/Update_Customer.html">Update Customer</a></li>
            <li><a href="customer/Delete_Customer.html">Delete Customer</a></li>
            <li><a href="customer/customer_balances.php">Customer Balances</a></li>
            <li><a href="customer/View_Customer.html">View A Customer</a></li>
            <li><a href="customer/all_late_payments.php">All Late Payments</a></li>
            <li><a href="customer/New_Employment_History.html">Add Employ History</a></li>
        </ul>

        <li><a href="#">Employees</a>
        <ul class="second-level-menu">
            <li><a href="employee/View_Employee.html">View Employee</a></li>
            <li><a href="employee/New_Employee.html">New Employee</a></li>
            <li><a href="employee/employee_commission.php">Commission Totals</a></li>
        </ul>

        <li><a href="#">Warranties</a>
        <ul class="second-level-menu">
            <li><a href="warranty/New_Warranty.html">Add A Warranty</a></li>
            <li><a href="warranty/View_Warranty.html">View Warranties</a></li>
            <li><a href="warranty/all_warranties.php">All Sold Warranties</a></li>
        </ul>

        <li><a href="#">Repairs</a>
        <ul class="second-level-menu">
            <li><a href="vehicle/Vehicle_Repair.html">Add A Repair Ticket</a></li>
            <li><a href="vehicle/View_Repairs.html">View Repairs</a></li>
        </ul>
    </ul>

    <br><br><br>
</body>

<footer>Made by: Tyler Siwy, Ryan Wenman, Reid Paulhus, Rylan Bueckert</footer>

</html>
<?php
//Checks for, then creates database, tables, and populates with data
database_setup(); 
?>