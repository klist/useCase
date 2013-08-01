<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "usecase";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass,  $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
<?php
	// 2. Perform database query
	$query  = "SELECT useCaseName, useCaseIndex, version, subVersion ";
	$query .= "FROM usecaseinfo ";
	//$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY useCaseName ASC";
	$result = mysqli_query($connection, $query);
	// Test if there was a query error
	if (!$result) {
		die("Database query failed.");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Databases</title>
	</head>
	<body>
		Use Case Name:
        <ul>
		<?php
			// 3. Use returned data (if any)
			while($row = mysqli_fetch_assoc($result)) {
			//output data from each row 
			//var_dump($row);
		?>
        
				<li>  <?php echo $row["useCaseName"], "  " , $row["version"] ,"." , $row["subVersion" ]; ?></li>
                
					
		<?php			
              }
		?>
        </ul>
		<?php
		  // 4. Release returned data
		  mysqli_free_result($result);
		?>
	</body>
</html>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>