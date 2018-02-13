<?php

include("connection.php");

# Create connect database if not exists
$query1 = "CREATE DATABASE IF NOT EXISTS connect";
mysqli_query($connection, $query1);

# Select the connect database
mysqli_select_db($connection, "connect");

# Create details table if not exists
$query2 = "CREATE TABLE IF NOT EXISTS details(id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, designation VARCHAR(60) NOT NULL)";
mysqli_query($connection, $query2);

# Random array
$array = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N");

# Insert array elements into the details table (3 times)
for($k = 0; $k < 3; $k++)
{
	for($i = 0; $i < sizeof($array); $i++)
	{
		$query3 = "INSERT INTO details(first_name, last_name, designation) VALUES('$array[$i]', '$array[$i]', '$array[$i]')";
		mysqli_query($connection, $query3);
	}
}

# Close MYSQL connection
mysqli_close($connection);

echo "Records Added three times.";

?>