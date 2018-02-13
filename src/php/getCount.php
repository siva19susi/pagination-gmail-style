<?php

# Include MYSQL Database connection
include("connection.php");

# Select a specific database
mysqli_select_db($connection, "connect");

# Return total_no_of_rows 
# Select any one row from the table
$query = "SELECT id FROM details";
$nrows = mysqli_num_rows(mysqli_query($connection, $query));
echo $nrows;

?>
