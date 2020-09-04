<?php 

// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
	
    // include the config file that we created before
    require "../config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Get the contents of the form and store it in an array
        $new_work = array( 
            "brand" => $_POST['brand'], 
            "colour" => $_POST['colour'],
            "size" => $_POST['size'],
          
        );
        
        // THIRD: Turn the array into a SQL statement
        $sql = "INSERT INTO shoes (brand, colour, size) VALUES (:brand, :colour, :size)";        
        
        // FOURTH: Now write the SQL to the database
        $statement = $connection->prepare($sql);
        $statement->execute($new_work);

	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>


<?php include "templates/header.php"; ?>

<h2>Add Shoe</h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Shoe added to collection!</p>
<?php } ?>

<!--form to collect data for each artwork-->

<form method="post">
<label for="brand">Brand</label> 
<input type="text" name="brand" id="brand"> 
<label for="colour">Colour</label> 
<input type="text" name="colour" id="colour"> 
<label for="size">Size</label> 
<input type="text" name="size" id="size"> 
 
<input type="submit" name="submit" value="Submit">
</form>



<?php include "templates/footer.php"; ?>