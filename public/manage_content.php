
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php
	// 2. Perform database query
	$query  = "SELECT action, id ";
	$query .= "FROM actions ";
	//$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY id ASC";
	$result = mysqli_query($connection, $query);
	// Test if there was a query error
	confirm_query($result);
	
?>
<?php include("../includes/layouts/header.php");?>
    <div id="main">
      <div id="navigation">
        <ul class="subjects">
	   <?php
			// 3. Use returned data (if any)
			while($row = mysqli_fetch_assoc($result)) {
				// output data from each row
				//var_dump($row);
				//echo "<hr />"; 
			?>
            <li><?php echo $row["action"] . " (" . $row["id"] . ")"; ?></li>
		<?php
        }
		?>
        </ul>
      </div>
      <div id="page">
        <h2>Manage Content</h2>
        
       
      </div>
    </div>
    
 <?php
 // 4. Release returned data
	 mysqli_free_result($result);
?>
<?php include("../includes/layouts/footer.php");?>

