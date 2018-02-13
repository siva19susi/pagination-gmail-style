<?php

# Initialise current_page_no
$current_page_no = $_POST["current_page_no"];

# Initialise number of rows_per_page
$rows_per_page = $_POST["rows_per_page"];

# Include MYSQL Database connection
include("connection.php");

# Select a specific database
mysqli_select_db($connection, "connect");

# Initialise the record row number to start with
if($current_page_no == 1)
    $start = 0;
else
    $start = $rows_per_page * ($current_page_no - 1); 

# Execute the SQL query
$query = "SELECT * FROM details LIMIT $start, $rows_per_page";
$result = mysqli_query($connection, $query);
    
?>

<table class="table is-striped is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Designation</th>
        </tr>
    </thead>
    <tbody>

<?php

# Loop through the SQL result to print records row wise
while ($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>".$row["id"]."</td>"."<td>".$row["first_name"]."</td>";
    echo "<td>".$row["last_name"]."</td>"."<td>".$row["designation"]."</td>";
    echo "</tr>"; 
}

# Close MYSQL connection
mysqli_close($connection);

?>

    </tbody>
</table>
