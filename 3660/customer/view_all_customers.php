<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "../stylesheet.css"/>
</head>

<body>
	<a href=../../index.php"><button>Back</button></a>
	<br><br><br>

<?php
include '../credentials.php';
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT *
FROM Customer";

$result = $con->query($sql);

if ($result->num_rows > 0) 
	{ 
		echo "<div class='customer_container'>";
		echo "<div class='item'>";
		echo "First Name";
		echo "</div>";
		echo "<div class='item'>";
		echo "Last Name";
		echo "</div>";
		echo "<div class='item'>";
		echo "D.O.B.";
		echo "</div>";
		echo "<div class='item'>";
		echo "Gender";
		echo "</div>";
		echo "<div class='item'>";
		echo "Address";
		echo "</div>";
		echo "<div class='item'>";
		echo "City";
		echo "</div>";
		echo "<div class='item'>";
		echo "Province";
		echo "</div>";
		echo "<div class='item'>";
		echo "Postal Code";
		echo "</div>";
		echo "<div class='item'>";
		echo "Phone Number";
		echo "</div>";
		echo "</div></br>";

		echo "<div class='customer_container'>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class='item'>";
			echo $row["first_name"]." ";
			echo "</div>";

			echo "<div class='item'>";
			echo $row["last_name"]." ";
			echo "</div>";

            echo "<div class='item'>";
			echo $row["dob"]." ";
            echo "</div>";
            
            echo "<div class='item'>";
			echo $row["gender"]." ";
            echo "</div>";
            
            echo "<div class='item'>";
			echo $row["building_number"]." ";
			echo $row["street"]." ";
            echo "</div>";
            
            echo "<div class='item'>";
			echo $row["city"]." ";
            echo "</div>";
            
            echo "<div class='item'>";
			echo $row["province"]." ";
			echo "</div>";
            
            echo "<div class='item'>";
			echo $row["postal_code"]." ";
            echo "</div>";
            
			echo "<div class='item'>";
			echo $row["phone_number"]." ";
			echo "</div>";
		}
		echo "</div>";
	} else 
{
	echo "0 results";
}

?>

</body>

</html>