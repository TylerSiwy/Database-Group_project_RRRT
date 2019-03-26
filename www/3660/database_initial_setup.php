<?php
include 'vehicle/create_vehicle_table.php';
include 'vehicle/create_used_vehicle_table.php';
include 'vehicle/create_new_vehicle_table.php';
include 'create_customer_table.php';
include 'sales/create_sale_table.php';
include 'employee/create_employee_table.php';
include 'warranty/create_warranty_table.php';
include 'warranty/create_items_covered_table.php';
include 'vehicle/create_repair_table.php';
include 'sales/create_payments_table.php';
include 'customer/create_employment_history_table.php';
include 'sales/create_sale_customer_table.php';
include 'sales/create_sale_employee_table.php';
include 'sales/create_sale_vehicle_table.php';
include 'warranty/create_vehicle_warranty_table.php';



function database_setup(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Dealership";
    // Create connection
    $con = new mysqli($servername, $username, $password);
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error."<br>");
    } 

    // Create database
    $sql = "CREATE DATABASE dealership";
    if ($con->query($sql) === TRUE) {
        echo "Database created successfully"."<br>";
    } else {
        echo "Error creating database: " . $con->error."<br>";
    }
    // Entity Sets
    create_vehicle_table();
    create_used_vehicle_table();
    create_new_vehicle_table();
    create_customer_table();
    create_sale_table();
    create_employee_table();
    create_warranty_table();
    create_items_covered_table();

    // Weak Entity Sets
    create_repair_table();
    create_payments_table();
    create_employment_history_table();

    //Relationship Sets
    create_sale_customer_table();
    create_sale_employee_table();
    create_sale_vehicle_table();
    create_vehicle_warranty_table();
}
?>