<?php
include 'vehicle/create_vehicle_table.php';
include 'vehicle/create_used_vehicle_table.php';
include 'vehicle/create_new_vehicle_table.php';
include 'customer/create_customer_table.php';
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

        //Insertions

        insertSQL("Vehicle", 
        "INSERT INTO Vehicle VALUES('1HGBH41JXMN109186','1997','camry','CE','purple','purple','2019-10-20');
        INSERT INTO Vehicle VALUES('9ZGBH41JXMN109185','2000','corolla','XE','yellow','purple','2010-04-30');
        INSERT INTO Vehicle VALUES('2BGBH41JXMN109185','2019','rav4','BE','yellow','purple','2019-04-30');
        INSERT INTO Vehicle VALUES('3B22H41JXMN109185','2019','rav4','BE','yellow','purple','2019-02-20');
        INSERT INTO Vehicle VALUES('G5GHSS3K5DBF4HD5H','2006','camry','LE','pink','lime','2018-09-08');");

        insertSQL("New_Vehicle", 
        "INSERT INTO New_Vehicle VALUES('2BGBH41JXMN109185',10,2000.00);
        INSERT INTO New_Vehicle VALUES('3B22H41JXMN109185',20,4000.00);");

        insertSQL("Used_Vehicle", 
        "INSERT INTO Used_Vehicle VALUES('1HGBH41JXMN109186',200,'steven','person','0002500.00','0001500.00');
        INSERT INTO Used_Vehicle VALUES('9ZGBH41JXMN109185',200,'toyota motor','toyota motor','2000.00','2500.00');");

        insertSQL("Sale", 
        "INSERT INTO Sale VALUES('S-345', 1.2, 10000.00, 10.00, 10.00, '2018-03-01');    
        INSERT INTO Sale VALUES('S-117', 2.1, 6000.00, 100.00, 120.00, '2018-03-01');
        INSERT INTO Sale VALUES('S-454', 3.12, 43400.00, 1330.00, 1110.00, '2018-03-01');
        INSERT INTO Sale VALUES('S-420', 5.0, 5000, 500, 20.00, '2019-03-27');");

        insertSQL("Employee", 
        "INSERT INTO Employee VALUES('E-069', 'George', 'Clooney', 4038675309);
        INSERT INTO Employee VALUES('E-117', 'Charlize', 'Theron', 2521113456);
        INSERT INTO Employee VALUES('E-666', 'Simon', 'Pegg', 232116764);");

        insertSQL("Warranty",
        "INSERT INTO Warranty VALUES('P-123', 'Tom', 12, '2019-03-25', 100.00, 1000.00);
        INSERT INTO Warranty VALUES('P-234', 'Jimmy', 12, '2019-03-24', 100.00, 1000.00);
        INSERT INTO Warranty VALUES('P-456', 'Greg', 12, '2019-03-23', 100.00, 1000.00);
        INSERT INTO Warranty VALUES('P-567', 'Chris', 12, '2019-03-22', 100.00, 1000.00);
        INSERT INTO Warranty VALUES('P-678', 'Deb', 12, '2019-03-21', 100.00, 1000.00);");

        insertSQL("items_covered", 
        "INSERT INTO items_covered VALUES('P-123', 'Windshield');
        INSERT INTO items_covered VALUES('P-234', 'Left Tire');
        INSERT INTO items_covered VALUES('P-345', 'Muffler');
        INSERT INTO items_covered VALUES('P-456', 'Right Passenger Set');
        INSERT INTO items_covered VALUES('P-567', 'N/A');");

        insertSQL("Customer",
        "INSERT INTO Customer values('Rylan', 'Bueckert', '1997-09-18', 'Male', 1230, '3 Ave', 'La Crete', 'Alberta', 'T0H2H0', '7809283127');
        insert into Customer values('Ryan', 'Wenman', '1940-02-14', 'Male', 30445, '66 Street', 'Airdrie', 'Alberta', 'T4A6G9', '6664206969');
        insert into Customer values('Tyler', 'Siwy', '1992-09-02', 'Male', 420, '69 Street', 'Calgary', 'Alberta', 'T5P4H0', '457285347');
        ");

        insertSQL("Sale_Customer",
        "INSERT INTO Sale_Customer VALUES('C-000', 'S-345');
        INSERT INTO Sale_Customer VALUES('C-002', 'S-117');
        INSERT INTO Sale_Customer VALUES('C-002', 'S-454');");

/* relations ******************************************************/
        insertSQL("Sale_Employee","INSERT INTO Sale_Employee VALUES('E-069', 'S-345');
        INSERT INTO Sale_Employee VALUES('E-666', 'S-117');
        INSERT INTO Sale_Employee VALUES('E-117', 'S-454');");

        insertSQL("Sale_Vehicle","INSERT INTO Sale_Vehicle VALUES('1HGBH41JXMN109186', 'S-345');
        INSERT INTO Sale_Vehicle VALUES('9ZGBH41JXMN109185', 'S-117');
        INSERT INTO Sale_Vehicle VALUES('3B22H41JXMN109185', 'S-454');");

        insertSQL("Vehicle_Warranty", "INSERT INTO Vehicle_Warranty VALUES('P-123', '1HGBH41JXMN109186');
        INSERT INTO Vehicle_Warranty VALUES('P-234', '9ZGBH41JXMN109185');
        INSERT INTO Vehicle_Warranty VALUES('P-456', '2BGBH41JXMN109185');");

        insertSQL("Repairs","INSERT INTO Repairs VALUES('9ZGBH41JXMN109185', 'flat rear left tire', 100, 98.76);
        INSERT INTO Repairs VALUES('1HGBH41JXMN109186', 'flat rear left tire', 100, 98.76);
        INSERT INTO Repairs VALUES('1HGBH41JXMN109186', 'worn brake', 250, 286.21);");

        insertSQL("Payments","INSERT INTO Payments VALUES('S-345','n-123','2019-10-10',15,2000,723854345);
        INSERT INTO Payments VALUES('S-345','n-223','2019-11-11',15,2000,723854345);
        INSERT INTO Payments VALUES('S-345','n-323','2019-12-12',15,2000,723854345);");

        insertSQL("Employment_History","INSERT INTO Employment_History VALUES('Rylan', 'Bueckert', '7809283127', '2019-10-10','apple-picker','joey','joeys only','4039283433',21,'alberta','airdrie','T4B1W2');
        INSERT INTO Employment_History VALUES('Ryan', 'Wenman', '6664206969','2019-09-10','apple-dropper','joey','joeys only','4039283433',21,'alberta','airdrie','T4B1W2');
        ");

    } else {
        echo "Database not created: " . $con->error."<br>";
    }
}
function insertSQL(string $tableName, string $sql){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Dealership";
    $con = new mysqli($servername, $username, $password, $dbname);

        if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
        }
    if(mysqli_multi_query($con, $sql)){
        echo $tableName." records inserted successfully.<br>";
        } else{
        echo "ERROR: Not able to insert $sql. " . mysqli_error($con);
        }
        mysqli_close($con); 
}
?>